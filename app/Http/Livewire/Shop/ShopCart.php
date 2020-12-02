<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
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
    }
}
