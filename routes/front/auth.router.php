<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Front\Auth\AuthController;

Route::name('front.')
    ->group(function () {
        Route::post('register', [AuthController::class, 'register'])
            ->name('auth.register');

        Route::post('login', [AuthController::class, 'login'])
            ->name('auth.login');

        Route::post('otp/send', [AuthController::class, 'sendOtp'])
            ->name('auth.otp.send');

        Route::post('otp/verify', [AuthController::class, 'verifyOtp'])
            ->name('auth.otp.verify');

        Route::post('password/otp/verify', [AuthController::class, 'verifyForgetPasswordOtp'])
            ->name('auth.password.otp.verify');

        Route::post('password/reset', [AuthController::class, 'forgetPassword'])
            ->name('auth.password.reset');

        Route::post('logout', [AuthController::class, 'logout'])
            ->name('auth.logout');
    });
