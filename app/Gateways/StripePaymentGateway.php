<?php
namespace App\Gateways;

use App\Contracts\PaymentGatewayInterface;

class StripePaymentGateway implements PaymentGatewayInterface
{
    public function charge($amount) {
        // Implement Stripe-specific charging logic
        return "Stripe charged with $amount";
    }
}