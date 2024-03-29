<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.pages.orders.index', compact('orders'));
    }

    public function view($id)
    {
        $states = ['pending', 'processing', 'shipped', 'cancelled'];
        $order = Order::with('user','items','items.product','items.color')->findOrFail($id);
        return view('admin.pages.orders.view', compact('order','states'));
    }

    public function updateStatus(Request $request, $id)
    {
        Order::findOrFail($id)->update($request->all());

        return back();
    }
}
