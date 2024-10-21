<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Dashboard\Product\ProductController;
use App\Http\Controllers\API\Dashboard\Ingredient\IngredientController;

Route::middleware(['auth:sanctum'])
    ->name('dashboard.')
    ->prefix('dashboard')
    ->group(function () {
        Route::resources(
            [
                'products' => ProductController::class,
                'ingredients' => IngredientController::class,
            ],
            [
                'except' => 'create'
            ]
        );
    });
