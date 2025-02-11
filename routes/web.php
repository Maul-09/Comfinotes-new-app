<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'Auth'])->name('Authentikasi');
Route::get('/dashboard-admin', [AdminController::class, 'Admin'])->name('dashboard-admin');
Route::get('/comunnity-admin', [AdminController::class, 'Comunnity'])->name('comunnity-admin');
Route::get('/dashboard-user', [UserController::class, 'User'])->name('dashboard-user');

Route::get('/forgot-password', [AuthController::class, 'Forgot'])->name('forgot-password');
Route::get('/reset-password', [AuthController::class, 'Reset'])->name('reset-password');
Route::get('/verif-email', [AuthController::class, 'Verif'])->name('verif-email');
Route::get('/forgot-password', [AuthController::class, 'Forgot'])->name('forgot-password');

