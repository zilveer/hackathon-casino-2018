<?php

use App\Models\User;
use App\Models\Wallet;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/scan', 'scan');

Route::get('users', function () {
    $users = User::with('wallets', 'wallets.tokens')->get();

    return view('user.index', compact('users'));
})->name('user.index');

Route::get('/user/{user}/wallets', function (User $user) {
    $wallets = $user->wallets;

    return view('user.wallets', compact('user', 'wallets'));
})->name('user.wallets');

Route::get('/wallet/{wallet}/qrcode', function (Wallet $wallet) {

    return view('wallet.qrcode', compact('wallet'));
})->name('wallet.qrcode');

Route::get('/user/{user}/wallet/{wallet}/tokens', function (User $user, Wallet $wallet) {
    $tokens = $wallet->tokens;

    return view('user.tokens', compact('user', 'wallet', 'tokens'));
})->name('user.tokens');