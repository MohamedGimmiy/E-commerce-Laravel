<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    // Home
    public function home()
    {
        return view('pages.home');
    }
    public function cart()
    {
        return view('pages.cart');
    }
    // Cart
}
