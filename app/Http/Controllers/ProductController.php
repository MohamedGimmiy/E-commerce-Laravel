<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Admin panel
    public function index()
    {
        return view('admin.pages.products.index');
    }

    public function create()
    {
        return view('admin.pages.products.create');
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
