@extends('layouts.master')
@section('title', $product->title)
@section('content')
    <div class="product-page">
        <div class="container">
            <div class="product-page-row">
                <section class="product-page-image">
                    <img src="{{asset('storage/' . $product->image)}}" alt="">
                </section>
                <section class="product-page-details">
                    <p class="p-title">{{$product->title}}</p>
                    <p class="p-price">${{$product->price/100}}</p>
                    <p class="p-category">- {{$product->category->name}}</p>
                    <p class="p-description">{{$product->description}}</p>
                    <form method="post" action="{{route('addToCart', $product->id)}}">
                        @csrf
                        <div class="p-form">
                            <div class="p-colors">
                                <label for="color">Color</label>
                                <select name="color" id="color" required>
                                    <option value="">-- Color --</option>
                                    @foreach ($product->colors as $color)
                                        <option value="{{$color->id}}">{{$color->name}}</option>
                                    @endforeach
                                </select>
                                <div class="p-quantity">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="quantity" min="1" max="100" value="1" required>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-cart" type="submit">Add To Cart</button>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection
