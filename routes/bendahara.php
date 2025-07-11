<?php

use App\Http\Controllers\bendahara\bendaharaController;
use App\Http\Controllers\bendahara\SaveMoneyController;
use Illuminate\Support\Facades\Route;


Route::middleware(['web', 'auth', 'role:bendahara'])->group(function(){
    Route::get('/dashboard-bendahara', [bendaharaController::class ,'bendahara'])->name('dashboard-bendahara');
    Route::get('/simpan-uang', [SaveMoneyController::class , 'money'])->name('simpan-uang');
    Route::get('/detail-barang', [bendaharaController::class , 'detail'])->name('see-detail');

    //Action
    Route::post('/bendahara/add-dana', [SaveMoneyController::class, 'AddDana'])->name('bendahara.add-dana');
});

?>
