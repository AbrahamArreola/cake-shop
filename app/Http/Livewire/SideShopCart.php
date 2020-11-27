<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class SideShopCart extends Component
{
    protected $listeners = [
        'cart:update' => '$refresh',
    ];

    public function render()
    {
        $productsIds = Session::has('products') ? Session::get('products') : [];

        $products = [];

        foreach($productsIds as $product){
            array_push($products, Product::find($product));
        }

        return view('livewire.side-shop-cart', compact('products'));
    }
}
