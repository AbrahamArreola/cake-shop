<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ShopContainer extends Component
{
    public $products;
    public $categories;

    public $searchString;
    public $priceValue = 1000;

    public $maxDays = 3;

    public function mount($products, $categories)
    {
        $this->products = $products;
        $this->categories = $categories;
    }

    public function render()
    {
        return view('livewire.shop-container');
    }

    public function filterSearch()
    {
        $this->products = Product::where('name', 'like', "%{$this->searchString}%")->get();
    }

    public function filterByPrice()
    {
        $this->products = Product::where('price', '<=', $this->priceValue)->get();
    }

    public function addToCart($productId)
    {
        $products = Session::has('products') ? Session::get('products') : [];

        if(!in_array($productId, $products)){
            Session::push('products', $productId);
            $this->emit('cart:update');
        }
    }
}
