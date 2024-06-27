<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin-page.manage-account', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin-page.edit-account', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:15',
        ], [
            'email.regex' => 'The email must be a valid Gmail address.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->only('name', 'email', 'address', 'phone_number');
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        $currentUser = auth()->user();
        // return response()->json($request);
        if ($currentUser->email === "admin@gmail.com") {
            return redirect()->route('admin.users')->with('success', 'User updated successfully.');
        } else {
            return redirect()->route('profile');
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }
}
