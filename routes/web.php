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

    Route::get('/wallets', function () {
        // lists user's wallets
    });

    Route::prefix('/wallet/{wallet}')->group(function () {
        Route::get('/', function () {
            // shows wallet's coins sum, grouped by currency
            // shows 'send' button
            // shows 'review' button
        });

        Route::get('/recieve', function () {
            // shows current wallet's QR code
            // shows wallet's coins sum, grouped by currency
            // update amount every .5 seconds
            // play a sound when the amount increases, then show a 'done' button
        });

        Route::get('/send', function () {
            // scan QR code
            // when QR is scanned:
            // + select wallet's coins to send
            // + input number of coins to send
            // post to /send
        });
    });
});
