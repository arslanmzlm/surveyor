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
    Route::get('/cities', [\App\Http\Controllers\Api\CityController::class, 'all']);

    // Hospital
    Route::get('/hospitals', [\App\Http\Controllers\Api\HospitalController::class, 'index']);
    Route::get('/hospitals/all', [\App\Http\Controllers\Api\HospitalController::class, 'all']);
    Route::post('/hospital/store', [\App\Http\Controllers\Api\HospitalController::class, 'store']);
    Route::get('/hospital/{hospital}', [\App\Http\Controllers\Api\HospitalController::class, 'show']);
    Route::post('/hospital/update/{hospital}', [\App\Http\Controllers\Api\HospitalController::class, 'update']);
    Route::post('/hospital/delete/{hospital}', [\App\Http\Controllers\Api\HospitalController::class, 'destroy']);

    // Clinic
    Route::get('/clinics', [\App\Http\Controllers\Api\ClinicController::class, 'index']);
    Route::get('/clinics/all', [\App\Http\Controllers\Api\ClinicController::class, 'all']);
    Route::post('/clinic/store', [\App\Http\Controllers\Api\ClinicController::class, 'store']);
    Route::get('/clinic/{clinic}', [\App\Http\Controllers\Api\ClinicController::class, 'show']);
    Route::post('/clinic/update/{clinic}', [\App\Http\Controllers\Api\ClinicController::class, 'update']);
    Route::post('/clinic/delete/{clinic}', [\App\Http\Controllers\Api\ClinicController::class, 'destroy']);
});

Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'authenticate']);
