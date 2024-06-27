<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;

class PaymentController extends Controller
{
    public function index($id)
    {
        $user = auth()->user();
        $cart = Cart::where("user_id", $user->id)->first();

        if (!$cart) {
            // Handle case where cart does not exist
            return redirect()->route('cart')->with('error', 'Cart not found.');
        }

        // Find the specific item in the cart by motorcycle_id
        $item = CartItem::where("cart_id", $cart->id)->where("motorcycle_id", $id)->first();

        if (!$item) {
            // Handle case where item does not exist
            return redirect()->route('cart')->with('error', 'Item not found in your cart.');
        }

        return view("payment", compact("item"));
    }

    // Payment
    public function payment($motorcycleId)
    {
        // Get the authenticated user
        $user = auth()->user();

        // Fetch the cart for the authenticated user
        $cart = Cart::where("user_id", $user->id)->first();

        if (!$cart) {
            return redirect()->route('cart')->with('error', 'Cart not found.');
        }

        // Find the specific cart item by motorcycle_id
        $cartItem = CartItem::where("cart_id", $cart->id)
            ->where("motorcycle_id", $motorcycleId)
            ->first();

        // $motor = Motorcycle::find($motorcycleId);

        if (!$cartItem) {
            return redirect()->route('cart')->with('error', 'Item not found in your cart.');
        }

        // Get the price of the specific motorcycle
        $totalPrice = $cartItem->motorcycle->price;

        // Create a new order
        $order = Order::create([
            'user_id' => $user->id,
            'motorcycle_id' => $cartItem->motorcycle_id,
            'price' => $totalPrice,
            'status' => 'Pending', // or any default status you want to set
        ]);

        // Remove the item from the user's cart
        $cartItem->delete();

        // Redirect to a confirmation page or any other page
        return redirect()->route('order')->with('success', 'Payment successful and order created.');
    }
}
