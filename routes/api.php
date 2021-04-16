<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RegisterController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::get('/items',[ItemController::class, 'index']);

Route::prefix('/item')->group(function(){
    Route::post('/store',[ItemController::class, 'store'])->middleware('auth:sanctum');
    Route::put('/{id}',[ItemController::class, 'update']);
    Route::delete('/{id}',[ItemController::class, 'destroy'])->middleware('auth:sanctum');
    Route::get('/type/{type}',[ItemController::class, 'type']);
});