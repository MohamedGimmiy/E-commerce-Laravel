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

        $products = Product::with('category', 'colors')->orderBy('created_at', 'desc')->get();
        
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
        // validate
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'colors' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:png,jpg,gif,svg|max:2048'
        ]);
        // store image
        $image_name = 'products/' . time() . rand(0, 9999)  .'.' . $request->image->getClientOriginalExtension();
        $request->image->storeAs('public', $image_name);
        // store
        $product = Product::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'price' => $request->price * 100, // convert dollar to cents (because of strip api)'
            'description' => $request->description,
            'image' => $image_name
        ]);

        // storing colors in colors_products table (many to many relationship)
        $product->colors()->attach($request->colors);

        // return response
        return back()->with('success','Product Saved');
    }

    public function edit($id)
    {
        return 'edit product';
    }

    public function update()
    {
        return 'update product';
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return back()->with('success', 'Product Deleted');

    }
}
