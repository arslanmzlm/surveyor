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

    // User
    Route::get('/users', [\App\Http\Controllers\Api\UserController::class, 'index']);
    Route::get('/users/all', [\App\Http\Controllers\Api\UserController::class, 'all']);
    Route::post('/user/store', [\App\Http\Controllers\Api\UserController::class, 'store']);
    Route::get('/user/{user}', [\App\Http\Controllers\Api\UserController::class, 'show']);
    Route::post('/user/update/{user}', [\App\Http\Controllers\Api\UserController::class, 'update']);
    Route::post('/user/delete/{user}', [\App\Http\Controllers\Api\UserController::class, 'destroy']);

    // Question
    Route::get('/question-types', [\App\Http\Controllers\Api\QuestionTypeController::class, 'index']);
    Route::post('/question-type/store', [\App\Http\Controllers\Api\QuestionTypeController::class, 'store']);
    Route::post('/question-type/delete/{question_type}', [\App\Http\Controllers\Api\QuestionTypeController::class, 'destroy']);

    // Template
    Route::get('/templates', [\App\Http\Controllers\Api\TemplateController::class, 'index']);
    Route::get('/templates/all', [\App\Http\Controllers\Api\TemplateController::class, 'all']);
    Route::post('/template/store', [\App\Http\Controllers\Api\TemplateController::class, 'store']);
    Route::get('/template/{template}', [\App\Http\Controllers\Api\TemplateController::class, 'show']);
    Route::post('/template/update/{template}', [\App\Http\Controllers\Api\TemplateController::class, 'update']);
    Route::post('/template/delete/{template}', [\App\Http\Controllers\Api\TemplateController::class, 'destroy']);

    // Workspace
    Route::get('/workspaces', [\App\Http\Controllers\Api\WorkspaceController::class, 'index']);
    Route::get('/workspaces/all', [\App\Http\Controllers\Api\WorkspaceController::class, 'all']);
    Route::post('/workspace/store', [\App\Http\Controllers\Api\WorkspaceController::class, 'store']);
    Route::get('/workspace/{workspace}', [\App\Http\Controllers\Api\WorkspaceController::class, 'show']);
    Route::post('/workspace/update/{workspace}', [\App\Http\Controllers\Api\WorkspaceController::class, 'update']);
    Route::post('/workspace/delete/{workspace}', [\App\Http\Controllers\Api\WorkspaceController::class, 'destroy']);

    // Group
    Route::get('/groups', [\App\Http\Controllers\Api\GroupController::class, 'index']);
    Route::get('/groups/all', [\App\Http\Controllers\Api\GroupController::class, 'all']);
    Route::get('/group/{group}', [\App\Http\Controllers\Api\GroupController::class, 'show']);
    Route::post('/group/update/patients/{group}', [\App\Http\Controllers\Api\GroupController::class, 'updatePatients']);
    Route::post('/group/update/surveys/{group}', [\App\Http\Controllers\Api\GroupController::class, 'updateSurveys']);
    Route::post('/group/delete/{group}', [\App\Http\Controllers\Api\GroupController::class, 'destroy']);
});

Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'authenticate']);
