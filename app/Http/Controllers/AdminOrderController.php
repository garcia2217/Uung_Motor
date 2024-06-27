<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'motorcycle')->orderBy('created_at', 'desc')->get();

        return view('admin-page.manage-order', compact('orders'));
    }

    public function ship(Order $order)
    {
        $order->update([
            'status' => 'Shipped' // Update the status to 'Shipped'
            // You can add more fields if needed
        ]);

        return redirect()->route('admin.orders')->with('success', 'Order shipped successfully.');
    }
}
