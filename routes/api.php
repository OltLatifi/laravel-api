<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;



// this creates a route automatically for the product controller
// if the product controller methods are named by the convention
// Route::resource('products', ProductController::class);


// public routes
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{slug}', [ProductController::class, 'show']);
Route::get('/products/search/{name}', [ProductController::class, 'search']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// protected routes
Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::put('/products/{slug}', [ProductController::class, 'update']);
    Route::delete('/products/{alug}', [ProductController::class, 'destroy']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::post('/logout', [AuthController::class, 'logout']);
    

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});