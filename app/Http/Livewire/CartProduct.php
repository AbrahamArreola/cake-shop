<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartProduct extends Component
{
    public $product;
    public $productAmount;

    public function mount($product)
    {
        $this->product = $product;
        $this->productAmount = Session::get('products')[$product->id];
    }

    public function removeProduct()
    {
        $products = Session::get('products');
        unset($products[$this->product->id]);

        Session::put('products', $products);
        $this->emit('cart:update');
    }

    public function updateProductAmount()
    {
        $products = Session::get('products');
        $products[$this->product->id] = $this->productAmount;
        Session::put('products', $products);
        $this->emit('cart:update');
    }

    public function upAmount()
    {
        if($this->productAmount < 20){
            $this->productAmount++;
            $this->updateProductAmount();
        }
    }

    public function downAmount()
    {
        if($this->productAmount > 1){
            $this->productAmount--;
            $this->updateProductAmount();
        }
    }

    public function render()
    {
        return view('livewire.cart-product');
    }
}
