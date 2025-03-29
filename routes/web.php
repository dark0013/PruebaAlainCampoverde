<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MarcacionController;
Route::get('/', function () {
    return view('welcome');
});


/* Route::get('/marcaciones', [MarcacionController::class, 'index']);   */
Route::post('marcaciones', [MarcacionController::class, 'index']);
