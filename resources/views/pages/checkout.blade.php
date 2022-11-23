@extends('layouts.master')
@section('title', 'Checkout')
@section('head')
    <style>
        #card-element{
            border-radius: 20px;
            border: 2px solid #ebe7e7;
            padding: 10px 5px;
        }

        #card-button{
            margin: 30px auto;
            margin-bottom: 0px;
        }
        #card-button:hover{
            margin: 30px auto;
            margin-bottom: 0px;
            border: 1px solid #6100ff;
            background: white;
            color: #6100ff;
        }

    </style>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{asset('js/stripe.js')}}"></script>
@endsection
@section('content')
    <header class="page-header">
        <h1>Checkout</h1>
        <h3 class="cart-amount">${{App\Models\Cart::totalAmount()}}</h3>
    </header>

    <main class="checkout-page">
        <div class="container">
            <div class="checkout-form">
                <form action="{{route('stripeCheckout')}}" id="payment-form" method="POST">
                    @csrf
                    <div class="field">
                        <label for="name">Name</label>
                        <input  type="text" name="name" id="name" value="{{old('name', auth()->user()->name)}}" placeholder="John Doe" class="@error('name') has-error @enderror">
                        @error('name')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">Email</label>
                        <input  type="email" name="email" id="email" value="{{old('email', auth()->user()->email)}}" placeholder="John Doe@gmail.com"  class="@error('email') has-error @enderror">
                        @error('email')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="phone">Phone</label>
                        <input  type="text" name="phone" id="phone" value="{{old('phone', auth()->user()->phone)}}" placeholder="+20 xxxxxxxx"  class="@error('phone') has-error @enderror">
                        @error('phone')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="country">Country</label>
                        <select name="country" id="country">
                            <option value="" disabled>-- Select Country --</option>
                            <option value="United States">United States</option>
                        </select>
                        @error('country')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="state">State</label>
                        <input  type="text" name="state" id="state" value="{{old('state', auth()->user()->state)}}" placeholder="New York" class="@error('state') has-error @enderror">

                        @error('state')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="city">City</label>
                        <input  type="text" name="city" id="city" value="{{old('city', auth()->user()->city)}}" placeholder="New York City" class="@error('city') has-error @enderror">

                        @error('city')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="field">
                        <label for="zip">ZipCode</label>
                        <input  type="text" name="zip" id="zip" value="{{old('zip', auth()->user()->zip)}}" placeholder="12345" class="@error('zip') has-error @enderror">

                        @error('zip')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="field">
                        <label for="address">Address</label>
                        <input  type="text" name="address" id="address" value="{{old('address', auth()->user()->address)}}" placeholder="AVC St." class="@error('address') has-error @enderror">

                        @error('address')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>
                    <input type="hidden" name='payment_method_id' id="payment_method_id" value="">

                    <div id="card-element"><!-- placeholder for Elements --></div>
                    <button class="btn btn-primary btn-block" id="card-button">Submit Payment</button>
                    <p id="payment-result"><!-- we'll pass the response from the server here --></p>
                </form>
            </div>
        </div>
    </main>
    <script>
        const stripe = Stripe('pk_test_51M71dhLlETGUHA9PivZFeJYuTXC5mrxzqOfhNpwupiOTJkwCSZ0qpyp5TRLS3CdUxjiurh5dCz8n2wzZtOQ2Iz7900fQ0qIydO');

        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');




        const form = document.getElementById("payment-form");

        var resultContainer = document.getElementById('payment-result');
        cardElement.on('change', function(event) {
        if (event.error) {
            resultContainer.textContent = event.error.message;
        } else {
            resultContainer.textContent = '';
        }
        });

        form.addEventListener('submit', async event => {
        event.preventDefault();
        resultContainer.textContent = '';
        const result = await stripe.createPaymentMethod({
            type: 'card',
            card: cardElement,
        });
        handlePaymentMethodResult(result);
        });

        const handlePaymentMethodResult = async ({ paymentMethod, error }) => {
        if (error) {
            // An error happened when collecting card details, show error in payment form
        } else {
            // Send paymentMethod.id to your server (see Step 3)
            // paymentMethod.id
            document.getElementById('payment_method_id').value = paymentMethod.id;
            form.submit();
        }
        };

        const handleServerResponse = async responseJson => {
        if (responseJson.error) {
            // An error happened when charging the card, show it in the payment form
            resultContainer.textContent = responseJson.error;
        } else {
            // Show a success message
            resultContainer.textContent = 'Success!';
        }
        };

    </script>
@endsection
