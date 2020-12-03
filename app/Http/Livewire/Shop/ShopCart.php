<?php

namespace App\Http\Livewire\Shop;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ShopCart extends Component
{
    public function render()
    {
        $productsDict = Session::has('products') ? Session::get('products') : [];

        $products = [];

        foreach($productsDict as $key => $value){
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

    public function makeOrder(){
        $productsDict = Session::has('products') ? Session::get('products') : [];

        if(count($productsDict) > 0){
            $products = Session::get('products');
            $total = 0;

            //get total amount
            foreach ($products as $key => $value) {
                $product = Product::find($key);
                $total += $value * $product->price;
            }

            $order = Order::create(['state' => 0, 'amount' => $total]);

            //create relations
            foreach ($products as $key => $value) {
                $product = Product::find($key);
                $order->products()->attach($product->id, ['quantity' => $value]);
            }
        }

        Session::forget('products');
        $this->emit('cart:update');
    }
}
