<?php

use App\Http\Controllers\Auth\CartController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Auth\StoreController;
use App\Http\Controllers\Auth\ProductController;
use App\Http\Controllers\Auth\OrderController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// المسار المحمي
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);



Route::middleware('auth:sanctum')->group(function () {

   

    //إضافة المتاجر//

    Route::post('/stores', [StoreController::class, 'store']);




    Route::get('/stores', [StoreController::class, 'index']);

    Route::get('/stores/{store}', [StoreController::class, 'show']);

    Route::get('/stores/search', [StoreController::class, 'search']);

    //عرض المنتجات والمتاجر
    Route::get('/products', [ProductController::class, 'index']);


    //إضافة المنتجات لمتجر//
    Route::post('/products', [ProductController::class, 'store']);


    Route::get('/products/{product}', [ProductController::class, 'show']);
    Route::get('/search', [ProductController::class, 'search']);

    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart', [CartController::class, 'store']);
    Route::delete('/cart/{cart}', [CartController::class, 'destroy']);

    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::put('/orders/{order}', [OrderController::class, 'update']);

    Route::delete('/orders/{order}', [OrderController::class, 'destroy']);

});
