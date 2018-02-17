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

Route::prefix('/user/{user}')->group(function () {

    Route::get('/wallets', function (User $user) {
        // lists user's wallets
        $wallets = $user->wallets()->get();
        return view('wallet.list', compact('wallets', 'user'));
    })->name('user.wallets');

    Route::prefix('/wallet/{wallet}')->group(function () {
        Route::get('/', function (User $user, Wallet $wallet) {
            // shows wallet's coins sum, grouped by currency
            // shows 'send' button
            // shows 'review' button
            return view('wallet.view', compact('wallet'));
        })->name('user.wallet');

    });

    Route::get('/recieve', function () {
        // shows current wallet's QR code
        // shows wallet's coins sum, grouped by currency
        // update amount every .5 seconds
        // play a sound when the amount increases, then show a 'done' button
        return view('wallet.receive');
    })->name('wallet.receive');

    Route::get('/send', function () {
        // scan QR code
        // when QR is scanned:
        // + select wallet's coins to send
        // + input number of coins to send
        // post to /send
        return view('wallet.send');
    })->name('wallet.send');
});
