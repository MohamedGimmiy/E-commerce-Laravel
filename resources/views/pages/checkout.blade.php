@extends('layouts.master')
@section('title', 'Checkout')
@section('content')
    <header class="page-header">
        <h1>Checkout</h1>
        <h3 class="cart-amount">${{App\Models\Cart::totalAmount()}}</h3>
    </header>

    <main class="checkout-page">
        <div class="container">
            <div class="checkout-form">
                <form action="" id="payment-form" method="POST">
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
                </form>
            </div>
        </div>
    </main>
@endsection
