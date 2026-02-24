<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\TransactionController;

// Create a user account
Route::post('/users', [UserController::class, 'store']);

// View user profile includes all wallets and balances
Route::get('/users/{user}', [UserController::class, 'show']);

// Create  wallets
Route::post('/wallets', [WalletController::class, 'store']);

// Select a single wallet to view (includes its transactions)
Route::get('/wallets/{wallet}', [WalletController::class, 'show']);

// Add transactions to a wallet
Route::post('/transactions', [TransactionController::class, 'store']);