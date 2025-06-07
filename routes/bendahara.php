<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['web', 'auth', 'role:bendahara'])->group(function(){
    Route::get('/dashboard-bendahara', fn() => view('bendahara.dashboard-bendahara'))->name('dashboard-bendahara');
    Route::get('/simpan-uang', fn() => view('bendahara.save-money'))->name('simpan-uang');
    Route::get('/detail-barang', fn()=> view('bendahara.detail-info'))->name('see-detail');
});

?>
