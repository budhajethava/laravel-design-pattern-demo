<?php
namespace App\Gateways;

use App\Contracts\PaymentGatewayInterface;

class PaypalPaymentGateway implements PaymentGatewayInterface
{
    public function charge($amount) {
        // Implement Paypal-specific charging logic
        return "Paypal charged with $amount";
    }
}