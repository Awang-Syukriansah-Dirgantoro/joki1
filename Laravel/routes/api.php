<?php

use App\Http\Controllers\{ AuthController, CartController, CategoryController, OrderController, ProductController };
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
  Route::apiResource('carts', CartController::class);
  Route::apiResource('products', ProductController::class);
  Route::apiResource('categories', CategoryController::class);
  Route::apiResource('orders', OrderController::class);
  Route::post('logout', [AuthController::class, 'logout']);
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);