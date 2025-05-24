<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['web', 'auth', 'role:admin'])->group(function(){
    Route::get('/dashboard-admin', fn()=> view('admin.dashboard-admin'))->name('dashboard-admin');
});

?>
