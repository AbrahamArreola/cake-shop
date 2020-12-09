<?php

namespace App\Http\Livewire\Shop;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use App\Mail\OrderCreated;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PaymentController;
use App\PayPal;

class ShopCart extends Component
{
    public $showSuccess = false;

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
      if($amount > 0){
        $products = Session::get('products');
        $products[$productId] = (int)$amount;
        Session::put('products', $products);
        $this->emit('cart:update');
      }
      else{
        $products = Session::get('products');
        $products[$productId] = 1;
        Session::put('products', $products);
        $this->emit('cart:update');
      }

    }

    public function makeOrder(){
        $products = Session::has('products') ? Session::get('products') : [];

        if(count($products) > 0){
            $total = 0;

            //get total amount
            foreach ($products as $key => $value) {
                $product = Product::find($key);
                $total += $value * $product->price;
            }

            $order = Order::create(['state' => 'pendiente', 'amount' => $total, 'user_id' => Auth::user()->id]);
            Session::put('order',$order);
            //create relations
            foreach ($products as $key => $value) {
                $product = Product::find($key);
                $order->products()->attach($product->id, ['quantity' => $value]);
            }

<<<<<<< Updated upstream
            //mail
            //$this->sendMail($order);

            //Paypal PaymentE
            $this->PaypalPayment($order);
            //$this->sendMail($order);
=======
            if ($deletedProduct) {
                session()->flash('fail', 'Un producto seleccionado fue retirado del catálogo, seleccione de nuevo. Disculpe las molestias u.u');
            } else {
                Session::put('amount', $total);
                Session::put('productsPaypal', $products);

                //Paypal PaymentE
                if($total > 0){
                    $this->PaypalPayment($total);
                }

                //$this->sendMail($order);
>>>>>>> Stashed changes

            Session::forget('products');
            $this->emit('cart:update');
            $this->showSuccess = true;
            //dd('hola');
        }
    }

    public function sendMail($order){
      //Mail::to(Auth::user()->email)->send(new OrderCreated($order));
    }

<<<<<<< Updated upstream
    public function PaypalPayment($order){
      $paypal = new PaymentController();
      //return redirect('/paypal/pay');
      $paypal->payWithPayPal($order);
=======
    public function PaypalPayment($amount)
    {
        $paypal = new PaymentController();
        $paypal->payWithPayPal($amount);
>>>>>>> Stashed changes
    }
}
