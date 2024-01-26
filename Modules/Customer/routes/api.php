<?php


use Illuminate\Support\Facades\Route;
use Modules\Customer\app\Http\Controllers\AssetController;
use Modules\Customer\app\Http\Controllers\CustomerController;

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
Route::prefix('customer')->group(function () {
    Route::get('/', [CustomerController::class, 'index']);
});
Route::prefix('asset')->group(function () {
    Route::get('/', [AssetController::class, 'index']);
});

//Protected route
Route::middleware(['auth:sanctum'])->prefix('customer')->group(function () {

    //Customer CRUD route
    Route::post('create', [CustomerController::class, 'store']);
    Route::put('update/{id}', [CustomerController::class, 'update']);
    Route::delete('delete/{id}', [CustomerController::class, 'destroy']);

});

//Protected route
Route::middleware(['auth:sanctum'])->prefix('asset')->group(function () {

    //Assets CRUD route
    Route::post('create', [AssetController::class, 'store']);
    Route::put('update/{id}', [AssetController::class, 'update']);
    Route::delete('delete/{id}', [AssetController::class, 'destroy']);

    //Attributes of Asset CRUD
    Route::post('create-attribute', [AssetController::class, 'storeAttribute']);
    Route::put('update/{id}', [AssetController::class, 'updateAttribute']);
    Route::delete('delete/{id}', [AssetController::class, 'destroyAttribute']);

    //Value of Asset CRUD
    Route::post('create-value', [AssetController::class, 'storeValue']);
    Route::put('update-value/{id}', [AssetController::class, 'updateValue']);
    Route::delete('delete-value/{id}', [AssetController::class, 'destroyValue']);
});

