<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;

use App\Mail\OrderCreated;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    private $apiContext;
    private $order;

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

    // ...

    public function payWithPayPal($order)
    {
        $this->order = $order;

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($this->order->amount);
        $amount->setCurrency('MXN');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('Pago a Cupcake Mio');

        $callbackUrl = url('/paypal/status');
        $callbackCancelUrl = url('shop/cart');
        //$callbackUrl = $this->payPalStatus;

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
            //return $this->payPalStatus($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            echo $ex->getData();
        }
    }

    public function payPalStatus(Request $request)
    {
      //dd($request->all());
      //dd(Session::get('order'));
      $paymentId = $request->input('paymentId');
      $payerId = $request->input('PayerID');
      $token = $request->input('token');
      if (!$paymentId || !$payerId || !$token) {
          $status = '¡Lo sentimos! El pago a través de PayPal no se pudo realizar1.';
          //dd($status);
          Session::put('status',$status);
          Session::put('status-id','2');
          return view('/paypal/status')->with(compact('status'));
      }

      $payment = Payment::get($paymentId, $this->apiContext);

      $execution = new PaymentExecution();
      $execution->setPayerId($payerId);

      /** Execute the payment **/
      $result = $payment->execute($execution, $this->apiContext);

      if ($result->getState() === 'approved') {
          Mail::to(Auth::user()->email)->send(new OrderCreated(Session::get('order')));
          $status = '¡Gracias! El pago a través de PayPal se ha ralizado correctamente.';
          //dd($status);
          Session::put('status',$status);
          Session::put('status-id','1');
          return view('/paypal/status')->with('status','hola hola');
      }

      $status = '¡Lo sentimos! El pago a través de PayPal no se pudo realizar2.';
      //dd($status);
      Session::put('status',$status);
      Session::put('status-id','2');
      return view('/paypal/status')->with(compact('status'));
    }
}
