<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    return match (Auth::user()->role) {
        'admin' => redirect()->route('admin.dashboard'),
        'bendahara' => redirect()->route('bendahara.dashboard'),
        'user' => redirect()->route('user.dashboard'),
        default => abort(403),
    };
})->name('home');

// Route::view('/bantuan', 'bantuan')->name('bantuan');

// Route::view('/kebijakan-privasi', 'privacy')->name('privacy');

Route::get('/tes', function () {
    return 'Ini route test!';
})->name('test');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
