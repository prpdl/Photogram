<?php

namespace App\Billing;


use Illuminate\Support\Str;


class CreditPaymentGateway implements PaymentGatewayContract
{

    private $currency;
    private $discount;

    /**
     * BankPaymentGateway constructor.
     * @param $currency
     */
    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }

    public function setDiscount($amount){
        $this->discount = $amount;
    }

    public function charge($amount){

        $charge = ((0.58/100)*$amount)/100;

        return [
            'Type' => 'Credit',
            'Name' => request()->all()['credit'],
            'discount' => '$'.$this->discount/100,
            'charge' => '$'. $charge,
            'Total amount' => '$'. (($amount - $this->discount)/100 + $charge),
            'currency' => $this->currency,
            'confirmation_number' => Str::random(),

        ];
    }

}
