<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['web', 'auth', 'role:bendahara'])->group(function(){
    Route::get('/dashboard-bendahara', fn() => view('bendahara.dashboard-bendahara'))->name('dashboard-bendahara');
});

?>
