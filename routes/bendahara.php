<?php

use App\Http\Controllers\bendahara\ApprovalController;
use App\Http\Controllers\bendahara\bendaharaController;
use App\Http\Controllers\bendahara\SaveMoneyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware(['web', 'auth', 'role:bendahara'])->group(function(){
    Route::get('/dashboard-bendahara', [bendaharaController::class ,'bendahara'])->name('dashboard-bendahara');
    Route::get('/simpan-uang', [SaveMoneyController::class , 'money'])->name('simpan-uang');
    Route::get('/detail-barang', [bendaharaController::class , 'detail'])->name('see-detail');

    Route::get('/admin/profile-bendahara', [ProfileController::class, 'profileBendahara'])->name('dashboard-bendahara.bendahara');
    Route::post('/update/profile/{id}', [ProfileController::class, 'updateProfile'])->name('bendahara.update');
    Route::post('/bendahara/notif/submit/', [ApprovalController::class, 'submit'])->name('bendahara.submit');

    //Action
    Route::post('/bendahara/add-dana', [SaveMoneyController::class, 'AddDana'])->name('bendahara.add-dana');
});

?>
