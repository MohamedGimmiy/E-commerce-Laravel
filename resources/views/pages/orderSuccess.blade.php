@extends('layouts.master')
@section('title', 'Success')
@section('content')
    <header class="page-header">
        <h1>Order Successfully placed!</h1>
    </header>



    <section class="page-success">
        <div class="container">
            <h1>Your Order Has Successfully Been Placed</h1>
            <h2>Your Order Id is: {{$order->id}}</h2>
        </div>
    </section>
@endsection
