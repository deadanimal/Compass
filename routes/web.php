<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CompassController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\PlayController;
use App\Http\Controllers\LokasiController;

use Illuminate\Support\Facades\Route;

Route::get('', [UserController::class, 'home']);
Route::get('faq', [UserController::class, 'faq']);
Route::get('friend/{username}', [UserController::class, 'satu_friend']);
Route::post('friend/{username}', [UserController::class, 'register_student']);
Route::get('billplz-redirect', [FinanceController::class, 'billplz_redirect']);
Route::post('billplz-callback', [FinanceController::class, 'billplz_callback']);

Route::middleware(['auth'])->group(function () {
    
    Route::get('compass', [CompassController::class, 'muka_compass']);
    Route::post('compass', [PlayController::class, 'generate_compass']);
    Route::get('compass/{id}', [CompassController::class, 'satu_compass']);
    Route::put('compass/{id}/add/{id2}', [CompassController::class, 'add_gem_to_compass']);
    Route::put('compass/{id}/remove/{id2}', [CompassController::class, 'remove_gem_from_compass']);
    
    Route::get('token', [FinanceController::class, 'muka_finance']);
    Route::post('token', [FinanceController::class, 'buy_token']);
    Route::post('token/transfer', [FinanceController::class, 'transfer_token']);
    
    Route::get('friend', [UserController::class, 'muka_friend']);
    Route::post('friend', [UserController::class, 'register_friend']);
    Route::post('friend/{id}/add', [UserController::class, 'add_friend']);
    Route::put('friend/{id}/remove', [UserController::class, 'remove_friend']);

    Route::get('lokasi/{id}', [LokasiController::class, 'satu']);
    Route::get('lokasi/{lat}/{lon}', [LokasiController::class, 'satu_coord']);

    Route::get('play', [PlayController::class, 'muka_play']);
    Route::get('play/{lat}/{lon}', [PlayController::class, 'lat_lon_play']);
    Route::post('play/traveler', [PlayController::class, 'play_traveler']);
    Route::post('play/trader', [PlayController::class, 'play_trader']);

    Route::post('kedudukan', [LokasiController::class, 'hantar_kedudukan']);

});

Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    
    Route::get('compass', [CompassController::class, 'senarai_compass']);

    Route::get('lokasi', [LokasiController::class, 'senarai']);
    Route::post('lokasi', [LokasiController::class, 'cipta']);    
    Route::post('lokasi/{id}/puzzle', [PlayController::class, 'cipta_puzzle']);

    Route::get('puzzle', [PlayController::class, 'senarai_puzzle']);
    Route::post('puzzle', [PlayController::class, 'cipta_puzzle']);    
    
    Route::get('token', [FinanceController::class, 'senarai_token']);
    Route::get('user', [UserController::class, 'senarai_user']);

});



require __DIR__.'/auth.php';
