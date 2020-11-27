<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartIcon extends Component
{
    protected $listeners = [
        'cart:update' => '$refresh',
    ];

    public function render()
    {
        $nProducts = Session::has('products') ? count(Session::get('products')) : '';

        return view('livewire.cart-icon', compact('nProducts'));
    }
}
