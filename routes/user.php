<?php

use App\Http\Controllers\User\TransactionController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth', 'role:user'])->group(function(){
    Route::get('/dashboard-user', [UserController::class ,'user'])->name('dashboard-user');
    Route::get('/dashboard-user/submission', [TransactionController::class ,'submission'])->name('dashboard-user.submission');
    Route::post('/submission/transaksi', [TransactionController::class ,'AddTransaction'])->name('user.submit');
});


?>
