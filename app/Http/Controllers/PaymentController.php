<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGatewayContract;
use App\Orders\orderDetails;
use Illuminate\Http\Request;
use App\Billing\BankPaymentGateway;
use Illuminate\Support\ServiceProvider;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(orderDetails $orderDetails , PaymentGatewayContract $paymentContract){

            $order = $orderDetails->all();
            dump($order);
            dd($paymentContract->charge(2500));

    }

}
