<?php

// Auth Controller ==============================================================================================
use App\Http\Controllers\Auth\AuthController;

use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function(){
    Route::get('/', 'Login')->name('login');
    Route::get('/forgot-password', 'Forgot')->name('forgot-password');
    Route::get('/reset-password', 'Reset')->name('reset-password');
    Route::get('/verif-email', 'Verif')->name('verif-email');

    Route::post('/logout', 'Logout')->name('logout');
});
