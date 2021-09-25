<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::resource('product', '\AppMax\Http\Controllers\ProductController')->only('index', 'store', 'update', 'destroy');

Route::apiResources([
    'product' => '\AppMax\Http\Controllers\ProductController'
]);