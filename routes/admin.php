<?php

// Admin Controller ==============================================================================================
use App\Http\Controllers\Admin\AdminController;

use Illuminate\Support\Facades\Route;

Route::controller(AdminController::class)->group(function(){
    Route::get('/dashboard-admin', 'Admin')->name('dashboard-admin');
});
?>
