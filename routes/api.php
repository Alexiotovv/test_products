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
    Route::get('/',[ PersonController::class, 'get']);
    Route::post('/',[ PersonController::class, 'create']);
    Route::get('/{id}',[ PersonController::class, 'getById']);
    Route::put('/{id}',[ PersonController::class, 'update']);
    Route::delete('/{id}',[ PersonController::class, 'delete']);
});

Route::prefix('v1/products')->group(function () {
    Route::get('/',[ ProductController::class, 'get']);
    Route::post('/',[ ProductController::class, 'create']);
    Route::get('/{id}',[ ProductController::class, 'getById']);
    Route::put('/{id}',[ ProductController::class, 'update']);
    Route::delete('/{id}',[ ProductController::class, 'delete']);
});