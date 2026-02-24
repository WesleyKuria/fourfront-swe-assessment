<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    // Create one or more wallets
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
        ]);

        $wallet = Wallet::create($validated);

        return response()->json($wallet, 201);
    }

    // Select a single wallet to view (includes balance and transactions)
    public function show(Wallet $wallet)
    {
        // Eager load the transactions so they are included in the JSON response
        $wallet->load('transactions');
        
        return response()->json($wallet);
    }
}