<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // crreate a user account no authentication required
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        // Hash the password just to follow basic Laravel conventions
        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        return response()->json($user, 201);
    }

    // 4. View user profile (includes wallets, wallet balances, and total balance)
    public function show(User $user)
    {
        // Eager load the wallets so they are included in the JSON response
        $user->load('wallets');
        
        return response()->json($user);
    }
}