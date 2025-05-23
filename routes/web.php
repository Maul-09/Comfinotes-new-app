<?php

// Admin Controller ==============================================================================================
use App\Http\Controllers\Admin\AdminController;

// Auth Controller ==============================================================================================
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\bendahara\bendaharaController;
// User Controller ==============================================================================================
use App\Http\Controllers\User\UserController;
// use App\Http\Controllers\Auth\PasswordResetLinkController;

// ==============================================================================================
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(AuthController::class)->group(function(){
    Route::get('/', 'Login')->name('login');
    Route::get('/forgot-password', 'Forgot')->name('forgot-password');
    Route::get('/reset-password', 'Reset')->name('reset-password');
    Route::get('/verif-email', 'Verif')->name('verif-email');
});

Route::controller(bendaharaController::class)->group( function(){
    Route::get('/dashboard-bendahara', 'Bendahara')->name('dashboard-bendahara');
});

// Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
//     ->middleware('guest')
//     ->name('password.request');

Route::controller(AdminController::class)->group(function(){
    Route::get('/dashboard-admin', 'Admin')->name('dashboard-admin');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/dashboard-user', 'User')->name('dashboard-user');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

