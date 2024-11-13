<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\CarController;
use App\Http\Controllers\V1\Credit\CalculateController;
use App\Http\Controllers\V1\RequestController;

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
Route::get('/v1/cars', [CarController::class, 'index']);
Route::get('v1/cars/{car}', [CarController::class, 'show']);
Route::get('/v1/credit/calculate', [CalculateController::class, 'index']);
Route::post('/v1/request', [RequestController::class, 'store']);