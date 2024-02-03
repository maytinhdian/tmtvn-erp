<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\School\app\Http\Controllers\ComputerController;
use Modules\School\app\Models\Computer;

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

// Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
//     Route::get('school', fn (Request $request) => $request->user())->name('school');
// });


//Public route
Route::prefix('computer')->group(function () {
    Route::get('/', [ComputerController::class, 'index']);
    Route::post('/create', [ComputerController::class, 'store']);
    Route::get('/show/{id}', 'ComputerController@show');

});

// Route::controller(ComputerController::class)->prefix('computer')->group(function() {
//     Route::get('/','index');
//     Route::post('search','search');
//     Route::get('show/{id}','show');
//     // Route::post('create', 'store');
// });

//Protected route
Route::middleware(['auth:sanctum'])->prefix('computer')->group(function () {

    //Computer Asset CRUD route
    Route::post('create', [ComputerController::class, 'store']);

});