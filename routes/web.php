<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CompassController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\PlayController;

use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'home']);

Route::middleware(['auth'])->group(function () {
    
    Route::get('/compass', [CompassController::class, 'muka_compass']);
    Route::get('/finance', [FinanceController::class, 'muka_finance']);
    Route::get('/play', [PlayController::class, 'muka_play']);

});

Route::middleware(['role:admin'])->group(function () {
    
    Route::get('/compass', [CompassController::class, 'senarai_compass']);

});



require __DIR__.'/auth.php';
