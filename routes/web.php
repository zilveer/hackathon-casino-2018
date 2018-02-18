<?php

use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;

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
    return User::with('tokens')->get();
})->name('user.index');

Route::get('/user/create', function () {
    $user = factory(User::class)->create();
    $token = factory(Token::class, 10)->make()->each(function ($token) use ($user) {
        $user->tokens()->save($token);
    });

    return redirect()->route('user.view', $user);
})->name('user.create');

Route::get('/user/{user}', function (User $user) {
    return view('user.view', compact('user'));
})->name('user.view');

Route::get('/user/{user}/send', function (User $user) {
    return view('user.send', compact('user'));
})->name('user.send');

Route::get('/user/{user}/receive', function (User $user) {
    return view('user.receive', compact('user'));
})->name('user.receive');

Route::get('/user/{user}/transfer', function (User $user, Request $request) {
    //
})->name('user.transfer');
