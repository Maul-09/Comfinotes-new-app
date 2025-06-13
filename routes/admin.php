<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::middleware(['web', 'auth', 'role:admin'])->group(function(){
    Route::get('/dashboard-admin', [AdminController::class, 'admin'])->name('dashboard-admin');


    // Action
    Route::get('/admin/delete/{id}', [AdminController::class, 'deleteAcount'])->name('admin.delete');
    Route::post('/admin/acount/add', [AdminController::class, 'addAcount'])->name('admin.acount.add');
});

?>
