<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CompassController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\PlayController;
use App\Http\Controllers\LokasiController;

use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'home']);

Route::middleware(['auth'])->group(function () {
    
    Route::get('/compass', [CompassController::class, 'muka_compass']);
    Route::get('/finance', [FinanceController::class, 'muka_finance']);
    Route::get('/play', [PlayController::class, 'muka_play']);

});

Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    
    Route::get('/compass', [CompassController::class, 'senarai_compass']);
    
    Route::get('/lokasi', [LokasiController::class, 'senarai']);
    Route::post('/lokasi', [LokasiController::class, 'cipta']);
    Route::get('/lokasi/{id}', [LokasiController::class, 'satu']);
    Route::post('/lokasi/{id}/puzzle', [PlayController::class, 'cipta_puzzle']);

    Route::get('/puzzle', [PlayController::class, 'senarai_puzzle']);
    Route::post('/puzzle', [PlayController::class, 'cipta_puzzle']);
    Route::get('/puzzle/{id}', [PlayController::class, 'satu_puzzle']);    
    
    Route::get('/token', [FinanceController::class, 'senarai_token']);
    Route::get('/user', [UserController::class, 'senarai_user']);

});



require __DIR__.'/auth.php';
