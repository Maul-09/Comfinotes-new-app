<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth', 'role:user'])->group(function(){
    Route::get('/dashboard-user', [UserController::class ,'user'])->name('dashboard-user');
});


?>
