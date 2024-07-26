<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;

// Public API Routes
Route::group([
    'middleware'   => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'v1'
], function () {
    Route::get('',  [HomeController::class, 'index']);
    Route::get('post', [UserPostController::class, 'index']);
    Route::post('post/create', [UserPostController::class, 'create']);
    Route::put('post/update', [UserPostController::class, 'update']);
    Route::delete('post/delete', [UserPostController::class, 'delete']);
    Route::get('story', [StoryController::class, 'index']);
    Route::post('story/create', [StoryController::class,  'create']);
    Route::put('story/update', [StoryController::class, 'update']);
    Route::delete('story/delete', [StoryController::class, 'delete']);
    Route::post('/send-message', [ChatController::class, 'sendMessage']);
});
