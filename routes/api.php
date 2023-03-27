<?php

use App\Http\Controllers\Api\v1\{
    CategoryController,
    DishController,
    FeatureController,
    RestaurantController
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/


Route::get('categories', CategoryController::class);
Route::get('dishes', DishController::class);
Route::get('features', FeatureController::class);
Route::get('restaurants', [RestaurantController::class, 'index']);
Route::get('restaurants/{categoryId}', [RestaurantController::class, 'index']);

