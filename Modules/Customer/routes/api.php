<?php


use Illuminate\Support\Facades\Route;
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

//Protected route
Route::middleware(['auth:sanctum'])->prefix('customer')->group(function () {

    //Customer CRUD route
    Route::post('create', [CustomerController::class, 'store']);
    Route::put('update/{id}', [CustomerController::class, 'update']);
    Route::delete('delete/{id}', [CustomerController::class, 'destroy']);

});

