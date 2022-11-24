@extends('layouts.master')

@section('title','Wishlist')
@section('content')
<header class="page-header">
    <h1>Wishlist</h1>
</header>
<section class="products-section">

<div class="container" style="margin-top: 30px;">
    <div class="products-row">
        @foreach ($products as $product)
            <x-product-box :product="$product" />
    
        @endforeach
    </div>
</div>
</section>
@endsection
