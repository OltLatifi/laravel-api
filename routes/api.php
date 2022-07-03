<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products/{id}', [ProductController::class, 'show']);

// Route::post('/products', [ProductController::class, 'store']);


// this creates a route automatically for the product controller
// if the product controller methods are named by the convention
Route::resource('products', ProductController::class);
Route::get('/products/search/{name}', [ProductController::class, 'search']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
