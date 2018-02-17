<?php

use App\Models\User;
use App\Models\Wallet;

// ------------------------------------------------------------------------
// Landing page

Route::get('/', function () {
    return view('welcome');
});

// ------------------------------------------------------------------------
// Demo Routes

Route::view('/scan', 'scan');

Route::view('/qrcode', 'qrcode');

// ------------------------------------------------------------------------
// User Routes

Route::get('/users', function () {
    return User::with('wallets.coins.currency')->get();
});

Route::prefix('/user/{user}')->group(function () {

    Route::get('/wallets', function (User $user) {
        $wallets = $user->wallets;

        return view('wallet.index', compact('wallets', 'user'));
    })->name('user.wallets');

    Route::prefix('/wallet/{wallet}')->group(function () {
        Route::get('/', function (User $user, Wallet $wallet) {
            return view('wallet.view', compact('user', 'wallet'));
        })->name('user.wallet');

        Route::get('/receive', function (User $user, Wallet $wallet) {
            return view('wallet.receive', compact('user', 'wallet'));
        })->name('wallet.receive');

        Route::get('/send', function (User $user, Wallet $wallet) {
            return view('wallet.send', compact('user', 'wallet'));
        })->name('wallet.send');
    });
});
