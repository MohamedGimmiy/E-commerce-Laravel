<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pagesController extends Controller
{
    // Home
    public function home()
    {
        $products = Product::with('category', 'colors')->orderBy('created_at', 'desc')->get();
        return view('pages.home', compact('products'));
    }
    public function cart()
    {
        //dd(session()->get('cart'));
        return view('pages.cart');
    }
    // Wishlist
    public function wishlist()
    {
        $products = Auth::user()->wishlist;
        return view('pages.wishlist', compact('products'));
    }
    public function account()
    {
        return view('pages.account');
    }
    public function product($id)
    {
        $product  = Product::with('category', 'colors')->findOrFail($id);
        return view('pages.product', compact('product'));
    }

    public function checkout()
    {
        return view('pages.checkout');
    }
    public function success()
    {
        return 'Successfully Done!';
    }
}
