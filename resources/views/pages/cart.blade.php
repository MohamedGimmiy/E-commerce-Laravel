@extends('layouts.master')
@section('title', 'Cart')
@section('content')
    <header class="page-header">
        <h1>Cart</h1>
        <h3 class="cart-amount">$999</h3>
    </header>
    <main class="cart-page">
        <div class="container">
            <div class="cart-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Color</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (session()->has('cart') && count(session()->get('cart')) > 0)
                        @foreach (session()->get('cart') as $key => $item )
                            <tr>
                                    <td>
                                        <a href="{{route('product',$item['product']['id'])}}" class="cart-item-title">
                                            <img src="{{asset('storage/'. $item['product']['image'])}}" alt="">
                                            <p>{{$item['product']['title']}}</p>
                                        </a>
                                    </td>
                                    <td>{{$item['color']['name']}}</td>
                                    <td>${{$item['product']['price']/100}}</td>
                                    <td>${{$item['quantity']}}</td>
                                    <td>$99</td>
                                    <td>
                                        <form action="" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-primary" type="submit">X</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="empty-cart">Your Cart Is Empty</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
