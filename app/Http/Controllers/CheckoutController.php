<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;

class CheckoutController extends Controller
{
    public function stripeCheckout(Request $request)
    {


        Stripe::setApiKey('');



        try {
            // Create the PaymentIntent
            $intent = PaymentIntent::create([
                'amount' => Cart::totalAmount()*100,
                'currency' => 'usd',
                'payment_method' => $request->payment_method_id,

                // A PaymentIntent can be confirmed some time after creation,
                // but here we want to confirm (collect payment) immediately.
                'confirm' => true,

                // If the payment requires any follow-up actions from the
                // customer, like two-factor authentication, Stripe will error
                // and you will need to prompt them for a new payment method.
                'error_on_requires_action' => true,
            ]);
        } catch (ApiErrorException $e) {
            // Display error on client
            echo json_encode(['error' => $e->getMessage()]);
        }
        // store order in db before redirect user

        return redirect()->route('success');
    }
}
