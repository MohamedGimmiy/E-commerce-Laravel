<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // index
    public function index()
    {
        return view('admin.pages.categories.index');
    }
    public function store(Request $request)
    {
        // validate our data
        $request->validate([
            'name'=>'required|unique:categories|max:255'
        ]);

        // store
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        // return response
        return back()->with('success','Category saved');
    }
}
