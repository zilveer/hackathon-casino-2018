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

Route::get('/user/create', function (Request $request) {
    $user = User::create($request->only('name', 'email'));

    foreach (Token::$brands as $brand) {
        foreach (range(1, 5) as $i) {
            $user->tokens()->create(compact('brand'));
        }
    }

    return redirect()->route('user.receive', $user);
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
    $from = User::findOrFail($request->from);

    $transfered = 0;
    foreach ($from->tokens()->take($request->tokens)->get() as $token) {
        $transfered += $token->user()->associate($user)->save();
    }

    return redirect()->route('user.view', $from)->with(compact('transfered'));
})->name('user.transfer');
