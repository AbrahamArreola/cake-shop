<?php

namespace App\Http\Livewire\Shop;

use App\Events\ShopUpdate;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Mail\OrderCreated;
use Exception;
use Illuminate\Support\Facades\DB;
use Stripe\Charge;
use Stripe\Exception\CardException;
use Stripe\Stripe;

class ShopCart extends Component
{
    protected $listeners = [
        'cart:update' => '$refresh',
        'confirm:order' => 'confirmOrder'
    ];

    private function getProducts()
    {
        $productsDict = Session::has('products') ? Session::get('products') : [];

        $products = [];

        foreach ($productsDict as $key => $value) {
            array_push($products, Product::find($key));
        }

        return $products;
    }

    public function render()
    {
        $products = $this->getProducts();

        return view('livewire.shop.shop-cart', compact('products'));
    }

    private function createOrderQuery($products, $total)
    {
        $order = Order::create(['state' => 'pendiente', 'amount' => $total, 'user_id' => Auth::user()->id]);

        //create relations
        foreach ($products as $key => $value) {
            $product = Product::find($key);
            if (isset($product)) $order->products()->attach($product->id, ['quantity' => $value]);
        }

        return $order;
    }

    private function cardPayment($orderId, $amount, $cardToken)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        Charge::create([
            "amount" => $amount * 100,
            "currency" => "mxn",
            "source" => $cardToken,
            "description" => "Cupcake mio pedido #" . $orderId
        ]);
    }

    public function confirmOrder($paymentData)
    {
        $products = Session::has('products') ? Session::get('products') : [];

        if (count($products) > 0) {
            $total = 0;
            $deletedProduct = false;

            //get total amount
            foreach ($products as $key => $value) {
                $product = Product::find($key);
                if (isset($product)) {
                    $total += $value * $product->price;
                } else {
                    $deletedProduct = true;
                    break;
                }
            }

            if ($deletedProduct) {
                Session::forget('products');
                session()->flash('fail', 'Un producto seleccionado fue retirado del catálogo, seleccione de nuevo. Disculpe las molestias u.u');
            } else {
                $lastOrder = Order::all()->sortByDesc('id')->first();
                $nextOrderId = $lastOrder ? (int) $lastOrder->id + 1 : 1;

                switch ($paymentData["paymentOption"]) {
                    case 'card':
                        $cardToken = $paymentData["token"];

                        try {
                            $this->cardPayment($nextOrderId, $total, $cardToken);
                        } catch (CardException $error) {
                            session()->flash('fail', $error->getError()->message);
                            return redirect()->route('shopCart');
                        } catch (Exception $error) {
                            session()->flash('fail', "Algo falló al tratar de realizar el pago");
                            return redirect()->route('shopCart');
                        }
                        break;

                    case 'paypal':
                        Session::put('totalAmount', $total);
                        return redirect()->route('payPalPayment', [$nextOrderId, $total]);
                        break;
                }

                $order = $this->createOrderQuery($products, $total);

                //Send to mail
                $this->sendMail($order);

                Session::forget('products');
                event(new ShopUpdate());
                session()->flash('success', 'Pedido realizado exitosamente!');
            }
        } else {
            session()->flash('fail', 'Seleccione por lo menos un producto para realizar un pedido.');
        }
        return redirect()->route('shopCart');
    }

    public function sendMail($order)
    {
        Mail::to(Auth::user()->email)->send(new OrderCreated($order));
    }
}
