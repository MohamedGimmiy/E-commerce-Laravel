<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;

class CheckoutController extends Controller
{
    public function stripeCheckout(Request $request)
    {

        $request->validate([
            'payment_method_id' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'address' => 'required|max:255'
        ]);

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
        $order = Order::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'zip' => $request->zip,
            'strip_id' => $request->payment_method_id,
            'status' => 'pending',
            'total' => Cart::totalAmount()
        ]);

        // store each ordered item of our cart in db (item table)
        foreach (session()->get('cart') as $item)
        {
            $order->items()->create([
                'product_id' => $item['product']['id'],
                'quantity' => $item['quantity'],
                'color_id' => $item['color']['id'],
            ]);
        }
        session()->forget('cart');
        return view('pages.orderSuccess',compact('order'));
    }
}
