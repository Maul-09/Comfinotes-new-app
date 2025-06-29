<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::middleware(['web', 'auth', 'role:admin'])->group(function(){
    Route::get('/dashboard-admin', [AdminController::class, 'admin'])->name('dashboard-admin');
    Route::get('/detail-user/{key_id}', [AdminController::class, 'detail'])->name('detail-user');


    // Action
    Route::post('/admin/users/add-user', [AdminController::class, 'AddUser'])->name('admin.users.add');
    Route::post('/admin/delete/{id}', [AdminController::class, 'deleteAcount'])->name('admin.delete');
    Route::post('/admin/acount/add', [AdminController::class, 'addAcount'])->name('admin.acount.add');
});

?>
