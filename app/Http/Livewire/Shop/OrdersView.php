<?php

namespace App\Http\Livewire\Shop;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrdersView extends Component
{
    public function render()
    {
        //Return all orders if user is admin
        if(Auth::user()->can('admin-settings')){
            $orders = Order::all();
        }
        else{
            $orders = Auth::user()->orders;
        }

        return view('livewire.shop.orders-view', compact('orders'));
    }

    public function takeOrder($orderId)
    {
        Order::find($orderId)->update(['state' => 'tomado']);
    }
}
