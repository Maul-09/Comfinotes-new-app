<?php

// Auth Controller ==============================================================================================
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerifEmailController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function(){
    Route::get('/', 'showLoginForm')->name('login');
    Route::post('/logout', 'Logout')->name('logout');
});

Route::get('/forgot-password', [ForgotPasswordController::class, 'Forgot'])->name('forgot-password');
Route::get('/reset-password', [ResetPasswordController::class, 'Reset'])->name('reset-password');
Route::get('/verif-email', [VerifEmailController::class, 'Verif'])->name('verif-email');


