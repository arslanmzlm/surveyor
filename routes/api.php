<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/cities', [\App\Http\Controllers\Api\CityController::class, 'index']);
    Route::get('/hospitals', [\App\Http\Controllers\Api\HospitalController::class, 'index']);
    Route::post('/hospital/store', [\App\Http\Controllers\Api\HospitalController::class, 'store']);
    Route::get('/hospital/{hospital}', [\App\Http\Controllers\Api\HospitalController::class, 'show']);
    Route::post('/hospital/update/{hospital}', [\App\Http\Controllers\Api\HospitalController::class, 'update']);
    Route::post('/hospital/delete/{hospital}', [\App\Http\Controllers\Api\HospitalController::class, 'destroy']);
});

Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'authenticate']);
