<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cart = Cart::where("user_id", $user->id)->first();
        $items = $cart ? CartItem::where("cart_id", $cart->id)->get() : [];
        // return response()->json($items->id);

        return view("cart", compact('items'));
    }

    // Add to Cart
    public function addToCart($id)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to add item(s) to cart.');
        }

        // Check if the current user already has a cart
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        // Add the item to the cart
        CartItem::create([
            'cart_id' => $cart->id,
            'motorcycle_id' => $id
        ]);

        return redirect()->route('cart')->with('success', 'Item added to cart successfully');
    }

    // Remove from Cart
    public function removeCart($id)
    {
        $item = CartItem::find($id);
        $item->delete();
        return redirect()->route('cart')->with("success", "Successfully remove item from cart");
    }
}
