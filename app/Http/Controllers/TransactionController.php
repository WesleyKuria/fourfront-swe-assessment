<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // 3. Add transactions to a wallet (Income or Expense)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'wallet_id' => 'required|exists:wallets,id',
            'type' => 'required|in:income,expense', // Must be exactly income or expense
            'amount' => 'required|numeric|gt:0',    // Must be a positive number
            'description' => 'nullable|string'
        ]);

        $transaction = Transaction::create($validated);

        return response()->json($transaction, 201);
    }
}