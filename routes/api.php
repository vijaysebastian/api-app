<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/fail', [WelcomeController::class, 'validationFail'])->name('validation-fail');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile'])->middleware('verified');
    Route::post('/logout', [AuthController::class, 'logout']);
});
