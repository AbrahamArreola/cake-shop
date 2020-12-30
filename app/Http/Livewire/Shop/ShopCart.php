<?php

namespace App\Http\Livewire\Shop;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Mail\OrderCreated;

class ShopCart extends Component
{
    protected $listeners = [
        'cart:update' => '$refresh',
    ];

    public function getProducts()
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

    public function confirmOrder()
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
                $order = Order::create(['state' => 'pendiente', 'amount' => $total, 'user_id' => Auth::user()->id]);

                //create relations
                foreach ($products as $key => $value) {
                    $product = Product::find($key);
                    if (isset($product)) $order->products()->attach($product->id, ['quantity' => $value]);
                }

                //Send to mail
                $this->sendMail($order);

                Session::forget('products');
                $this->emit('cart:update');

                session()->flash('success', 'Pedido realizado exitosamente!');
            }
        } else {
            session()->flash('fail', 'Seleccione por lo menos un producto para realizar un pedido.');
        }
        redirect()->route('shopCart');
    }

    public function sendMail($order)
    {
        Mail::to(Auth::user()->email)->send(new OrderCreated($order));
    }
}
