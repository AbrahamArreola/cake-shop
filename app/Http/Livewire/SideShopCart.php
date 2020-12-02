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
        $productsDict = Session::has('products') ? Session::get('products') : [];

        $products = [];

        foreach($productsDict as $key => $value){
            array_push($products, Product::find($key));
        }

        return view('livewire.side-shop-cart', compact('products'));
    }
}
