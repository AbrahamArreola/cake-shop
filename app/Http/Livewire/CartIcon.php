<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartIcon extends Component
{
    protected $listeners = [
        'cart:update' => '$refresh',
        'echo:order-update,ShopUpdate' => '$refresh',
    ];

    public function render()
    {
        if(Auth::user()->can('admin-settings')){
            $notifications = count(Order::where('state', 0)->get());
        }
        else{
            $notifications = Session::has('products') ? count(Session::get('products')) : 0;
        }

        return view('livewire.cart-icon', compact('notifications'));
    }
}
