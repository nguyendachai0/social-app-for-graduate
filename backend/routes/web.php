<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'showLoginView']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/checkauth', [AuthController::class, 'checkAuthentication'])->name('checkAuthentication');
Route::get('/user', [AuthController::class, 'getAuthenticatedUser'])->name('getAuthenticatedUser');

Route::get('/api/v1', [HomeController::class, 'index'])->name('home');
