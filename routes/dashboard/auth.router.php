<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Dashboard\Auth\AuthController;

Route::post('login', [AuthController::class, 'login'])
    ->name('auth.login');

Route::post('logout', [AuthController::class, 'logout'])
    ->name('auth.logout');
