<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth', 'role:user'])->group(function(){
    Route::get('/dashboard-user', fn() => view('user.dashboard-user'))->name('dashboard-user');
});


?>
