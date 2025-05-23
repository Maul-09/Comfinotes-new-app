<?php

// User Controller ==============================================================================================
use App\Http\Controllers\User\UserController;

use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function(){
    Route::get('/dashboard-user', 'User')->name('dashboard-user');
});


?>
