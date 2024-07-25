<?php

namespace App\Factories;

use App\Gateways\PaypalPaymentGateway;
use App\Gateways\StripePaymentGateway;
use App\Contracts\PaymentGatewayInterface;

class PaymenFactory
{    
    public function initPayment(): PaymentGatewayInterface
    {
        $gateWay = config('payment.gateway');
        switch ($gateWay) {
            case 'paypal':
                return new PaypalPaymentGateway();
                break;
            case 'stripe':
                return new StripePaymentGateway();
                break;
            default:
                throw new \InvalidArgumentException('Invalid argument supplied!');
                break;
        }
    }
}