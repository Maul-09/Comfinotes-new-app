<?php

use App\Http\Controllers\bendahara\bendaharaController;
use Illuminate\Support\Facades\Route;


Route::middleware(['web', 'auth', 'role:bendahara'])->group(function(){
    Route::get('/dashboard-bendahara', [bendaharaController::class ,'bendahara'])->name('dashboard-bendahara');
    Route::get('/simpan-uang', [bendaharaController::class , 'save'])->name('simpan-uang');
    Route::get('/detail-barang', [bendaharaController::class , 'detail'])->name('see-detail');
});

?>
