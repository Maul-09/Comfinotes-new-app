<?php

// Bendahara Controller ==============================================================================================
use App\Http\Controllers\bendahara\BendaharaController;

use Illuminate\Support\Facades\Route;


Route::controller(BendaharaController::class)->group( function(){
    Route::get('/dashboard-bendahara', 'Bendahara')->name('dashboard-bendahara');
});

?>
