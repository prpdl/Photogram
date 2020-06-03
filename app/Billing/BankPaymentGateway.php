<?php

namespace App\Billing;


use Illuminate\Support\Str;


class BankPaymentGateway implements PaymentGatewayContract
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

        return [
            'Type' => 'Bank',
            'Name' => request()->all()['bank'],
            'discount' => '$'.$this->discount/100,
            'amount' => '$'.($amount - $this->discount)/100,
            'currency' => $this->currency,
            'confirmation_number' => Str::random(),

        ];
    }

}
