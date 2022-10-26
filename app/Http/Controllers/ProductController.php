<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Admin panel
    public function index()
    {

        $products = Product::all();
        return view('admin.pages.products.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $colors = Color::all();
        return view('admin.pages.products.create',compact('categories','colors'));
    }

    public function store(Request $request)
    {
        return 'save product';
    }

    public function edit()
    {
        return 'edit product';
    }

    public function update()
    {
        return 'update product';
    }

    public function destroy($id)
    {
        return 'delete product';
    }
}
