<?php

use App\Events\TestingEvent;
use App\Http\Controllers\AuthControllerWeb;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthControllerWeb::class, 'showLoginView'])->name('login.view');
Route::post('/login', [AuthControllerWeb::class, 'login'])->name('login');
Route::post('/register', [AuthControllerWeb::class, 'register'])->name('register');
Route::get('/', [HomeController::class, 'websocket'])->name('home');
Route::get('broadcast', function () {
    broadcast(new TestingEvent());
});
Route::middleware('auth:web')->group(function () {
});
