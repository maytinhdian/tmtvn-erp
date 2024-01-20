<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\app\Http\Controllers\ProductController;

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

//Public route
Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
});

//Protected route
Route::middleware(['auth:sanctum'])->prefix('product')->group(function () {

    //Product CRUD route
    Route::post('create', [ProductController::class, 'store']);
    Route::put('update/{id}', [ProductController::class, 'update']);
    Route::delete('delete/{id}', [ProductController::class, 'destroy']);

});
