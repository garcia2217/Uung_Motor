<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index() {
        $user = auth()->user();
        $orders = Order::where("user_id", $user->id)->get();

        return view("order", compact('orders'));
    }

    public function finish(Order $order)
    {
        $order->status = 'Finished';
        $order->save();

        return redirect()->back()->with('success', 'Order marked as finished.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->back()->with('success', 'Order deleted successfully.');
    }
}
