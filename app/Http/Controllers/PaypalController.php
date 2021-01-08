<?php

namespace App\Http\Controllers;

use App\Events\ShopUpdate;
use App\Mail\OrderCreated;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

class PaypalController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $payPalConfig = Config::get('paypal');


        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret']
            )
        );

        $this->apiContext->setConfig($payPalConfig['settings']);
    }

    public function payWithPayPal($orderId, $orderAmount)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($orderAmount);
        $amount->setCurrency('MXN');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('Cupcake Mio - Pedido #' . $orderId);

        $callbackUrl = url('/paypal/status');
        $callbackCancelUrl = url('shop/cart');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)
            ->setCancelUrl($callbackCancelUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            dd($ex->getData());
        }
    }

    public function payPalStatus(Request $request)
    {
        $products = Session::has('products') ? Session::get('products') : [];

        $allProductsExist = $this->verifyProductExistence($products);

        if ($allProductsExist) {
            $paymentId = $request->input('paymentId');
            $payerId = $request->input('PayerID');
            $token = $request->input('token');

            if (!$paymentId || !$payerId || !$token) {
                $status = '¡Lo sentimos! El pago a través de PayPal no se pudo realizar.';
                return redirect()->route('shopCart')->with('fail', $status);
            }

            $payment = Payment::get($paymentId, $this->apiContext);

            $execution = new PaymentExecution();
            $execution->setPayerId($payerId);

            $result = $payment->execute($execution, $this->apiContext);

            if ($result->getState() === 'approved') {
                $total = Session::get('totalAmount');

                $order = Order::create(['state' => 'pendiente', 'amount' => $total, 'user_id' => Auth::user()->id]);

                foreach ($products as $key => $value) {
                    $product = Product::find($key);
                    if (isset($product)) $order->products()->attach($product->id, ['quantity' => $value]);
                }

                Mail::to(Auth::user()->email)->send(new OrderCreated($order));
                Session::forget('products');
                event(new ShopUpdate());
                return redirect()->route('shopCart')->with('success', 'Pedido realizado exitosamente!');
            }

            $status = '¡Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect()->route('shopCart')->with('fail', $status);
        }

        Session::forget('products');
        $status = 'Un producto seleccionado fue eliminado del catálogo por lo que el pago no fue efectuado. Disculpe las molestias';
        return redirect()->route('shopCart')->with('fail', $status);
    }

    public function verifyProductExistence($products)
    {
        $allProductsExist = true;

        foreach ($products as $key => $value) {
            $product = Product::find($key);
            if (!isset($product)) {
                $allProductsExist = false;
                break;
            }
        }

        return $allProductsExist;
    }
}
