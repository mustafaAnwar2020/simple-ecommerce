<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Front\Home\HomeController;
use App\Http\Controllers\API\Front\Order\OrderController;


Route::name('front.')
    ->group(function () {
        Route::prefix('home')
            ->group(function () {
                Route::get('products', [HomeController::class, 'products'])
                    ->name('products');

            });
            Route::resource('orders', OrderController::class)->only('store');

    });
