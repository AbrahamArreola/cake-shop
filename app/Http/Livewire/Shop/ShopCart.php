<?php

namespace App\Http\Livewire\Shop;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use App\Mail\OrderCreated;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PaymentController;
use App\PayPal;

class ShopCart extends Component
{
    public function render()
    {
        $productsDict = Session::has('products') ? Session::get('products') : [];

        $products = [];

        foreach ($productsDict as $key => $value) {
            array_push($products, Product::find($key));
        }

        return view('livewire.shop.shop-cart', compact('products'));
    }

    public function removeProduct($productId)
    {
        $products = Session::get('products');
        unset($products[$productId]);

        Session::put('products', $products);
        $this->emit('cart:update');
    }

    public function updateProductAmount($productId, $amount)
    {
        $products = Session::get('products');
        $products[$productId] = (int)$amount;
        Session::put('products', $products);
        $this->emit('cart:update');
    }

    public function makeOrder()
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
                session()->flash('fail', 'Un producto seleccionado fue retirado del catálogo, seleccione de nuevo. Disculpe las molestias u.u');
            } else {
                Session::put('amount', $total);
                Session::put('products', $products);

                //Paypal PaymentE
                $this->PaypalPayment($total);
                //$this->sendMail($order);

                $this->emit('cart:update');
            }
        }
    }

    public function sendMail($order)
    {
        //Mail::to(Auth::user()->email)->send(new OrderCreated($order));
    }

    public function PaypalPayment($amount)
    {
        $paypal = new PaymentController();
        //return redirect('/paypal/pay');
        $paypal->payWithPayPal($amount);
    }
}
