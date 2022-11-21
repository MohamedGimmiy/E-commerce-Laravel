<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $color = Color::findOrFail($request->color);

        $item = [
            'product' => $product,
            'quantity' => $request->quantity,
            'color' => $color
        ];
        if(session()->has('cart')){
            // add item to cart

            // already exist so increament the quantity
            $cart = session()->get('cart');
            $key = $this->checkItemInCart($item);
            if($key != -1){
                $cart[$key]['quantity'] += $request->quantity;
                session()->put('cart',$cart);
            }
            else{
                // New item
                session()->push('cart', $item);
            }
        }
        else {
            // create new cart
            session()->push('cart',$item);
        }
        return back()->with('addedToCart', 'success ! Product Has Been Added To Cart');
    }

    
    public function checkItemInCart($item)
    {
        foreach(session()->get('cart') as $key => $val){
            if($val['product']['id'] == $item['product']['id'] && $val['color']['id'] == $item['color']['id']){
                return $key;
            }
        }
        return -1;
    }
}
