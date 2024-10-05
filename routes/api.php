<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PersonController;
use App\Http\Controllers\API\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1/persons')->group(function () {
    Route::get('get/',[ PersonController::class, 'get']);
    Route::post('create/',[ PersonController::class, 'create']);
    Route::get('getById/{id}',[ PersonController::class, 'getById']);
    Route::put('update/{id}',[ PersonController::class, 'update']);
    Route::delete('delete/{id}',[ PersonController::class, 'delete']);
});


Route::prefix('v1/products')->group(function () {
    Route::get('/get',[ ProductController::class, 'get']);
    Route::post('/create',[ ProductController::class, 'create']);
    Route::get('getById/{id}',[ ProductController::class, 'getById']);
    Route::put('update/{id}',[ ProductController::class, 'update']);
    Route::delete('delete/{id}',[ ProductController::class, 'delete']);
});