<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class,'register']);
    Route::get('/api/v1', [HomeController::class, 'index']);


