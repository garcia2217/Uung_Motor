<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Motorcycle;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use Mockery\Undefined;

class AuthController extends Controller
{
    // Register
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'email.regex' => 'The email must be a valid Gmail address.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to login page with success message
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    // Login
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            if (!User::where('email', $request->email)->exists()) {
                session()->flash('error', 'Email is not registered!');
            } else {
                session()->flash('error', 'Password does not match!');
            }

            return redirect()->route('login');
        }

        // Store the token in a cookie
        Cookie::queue('token', $token, 60 * 24 * 7); // token valid for 1 week

        return redirect()->route('profile');
    }

    // Logout
    public function logout()
    {
        auth()->logout();
        Cookie::queue(Cookie::forget('token'));

        return redirect()->route('login')->with('success', 'Successfully log out.');
    }

    // Get Authenticated User
    public function me()
    {
        return response()->json(auth()->user());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ]);
    }
}
