<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware(['web', 'auth', 'role:admin'])->group(function(){
    Route::get('/dashboard-admin', [AdminController::class, 'admin'])->name('dashboard-admin');
    Route::get('/detail-user/{key_id}', [AdminController::class, 'detail'])->name('detail-user');

    Route::get('/admin/profile-admin', [ProfileController::class, 'profileAdmin'])->name('dashboard.profile');
    Route::post('/update/profile/{id}', [ProfileController::class, 'updateProfile'])->name('admin.update.profile');


    // Action user
    Route::post('/admin/users/add-user', [AdminController::class, 'AddUser'])->name('admin.users.add');
    Route::post('/admin/users/{id}', [AdminController::class, 'DeleteUser'])->name('admin.users.delete');

    // Action Admin
    Route::post('/admin/delete/{id}', [AdminController::class, 'deleteAcount'])->name('admin.delete');
    Route::post('/admin/acount/add', [AdminController::class, 'addAcount'])->name('admin.acount.add');
});

?>
