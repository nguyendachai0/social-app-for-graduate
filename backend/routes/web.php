<?php

use App\Http\Controllers\AuthControllerWeb;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:web')->group(function () {
    Route::get('/login', [AuthControllerWeb::class, 'showLoginView'])->name('login.view');
    Route::post('/login', [AuthControllerWeb::class, 'login'])->name('login');
    Route::post('/register', [AuthControllerWeb::class, 'register'])->name('register');
    Route::get('/api/v1', [HomeController::class, 'index'])->name('home');
});
