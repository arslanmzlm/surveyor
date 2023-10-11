<?php

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

Route::middleware(['auth:sanctum', App\Http\Middleware\CheckAbility::class])
    ->prefix('/admin')
    ->group(function () {
        // City
        Route::get('/cities/all', [\App\Http\Controllers\Api\Admin\CityController::class, 'all']);
        Route::get('/counties/all', [\App\Http\Controllers\Api\Admin\CityController::class, 'allCounties']);

        // Hospital
        Route::get('/hospitals', [\App\Http\Controllers\Api\Admin\HospitalController::class, 'index'])->name('hospital.list');
        Route::get('/hospitals/all', [\App\Http\Controllers\Api\Admin\HospitalController::class, 'all'])->name('hospital.all');
        Route::post('/hospital/store', [\App\Http\Controllers\Api\Admin\HospitalController::class, 'store'])->name('hospital.store');
        Route::get('/hospital/{hospital}', [\App\Http\Controllers\Api\Admin\HospitalController::class, 'show'])->name('hospital.show');
        Route::post('/hospital/update/{hospital}', [\App\Http\Controllers\Api\Admin\HospitalController::class, 'update'])->name('hospital.update');
        Route::delete('/hospital/delete/{hospital}', [\App\Http\Controllers\Api\Admin\HospitalController::class, 'destroy'])->name('hospital.destroy');

        // Clinic
        Route::get('/clinics', [\App\Http\Controllers\Api\Admin\ClinicController::class, 'index'])->name('clinic.list');
        Route::get('/clinics/all', [\App\Http\Controllers\Api\Admin\ClinicController::class, 'all'])->name('clinic.all');
        Route::post('/clinic/store', [\App\Http\Controllers\Api\Admin\ClinicController::class, 'store'])->name('clinic.store');
        Route::get('/clinic/{clinic}', [\App\Http\Controllers\Api\Admin\ClinicController::class, 'show'])->name('clinic.show');
        Route::post('/clinic/update/{clinic}', [\App\Http\Controllers\Api\Admin\ClinicController::class, 'update'])->name('clinic.update');
        Route::delete('/clinic/delete/{clinic}', [\App\Http\Controllers\Api\Admin\ClinicController::class, 'destroy'])->name('clinic.destroy');

        // User
        Route::get('/users', [\App\Http\Controllers\Api\Admin\UserController::class, 'index'])->name('user.list');
        Route::get('/users/all', [\App\Http\Controllers\Api\Admin\UserController::class, 'all'])->name('user.all');
        Route::post('/user/store', [\App\Http\Controllers\Api\Admin\UserController::class, 'store'])->name('user.store');
        Route::get('/user/{user}', [\App\Http\Controllers\Api\Admin\UserController::class, 'show'])->name('user.show');
        Route::post('/user/update/{user}', [\App\Http\Controllers\Api\Admin\UserController::class, 'update'])->name('user.update');
        Route::delete('/user/delete/{user}', [\App\Http\Controllers\Api\Admin\UserController::class, 'destroy'])->name('user.destroy');

        // Role
        Route::get('/roles', [\App\Http\Controllers\Api\Admin\RoleController::class, 'index'])->name('role.list');
        Route::get('/roles/all', [\App\Http\Controllers\Api\Admin\RoleController::class, 'all'])->name('role.all');
        Route::post('/role/store', [\App\Http\Controllers\Api\Admin\RoleController::class, 'store'])->name('role.store');
        Route::get('/role/{role}', [\App\Http\Controllers\Api\Admin\RoleController::class, 'show'])->name('role.show');
        Route::post('/role/update/{role}', [\App\Http\Controllers\Api\Admin\RoleController::class, 'update'])->name('role.update');
        Route::delete('/role/delete/{role}', [\App\Http\Controllers\Api\Admin\RoleController::class, 'destroy'])->name('role.destroy');

        // Ability
        Route::get('/abilities/all', [\App\Http\Controllers\Api\Admin\AbilityController::class, 'all']);

        // Question
        Route::get('/question-types', [\App\Http\Controllers\Api\Admin\QuestionTypeController::class, 'index'])->name('question.type.index');
        Route::post('/question-type/store', [\App\Http\Controllers\Api\Admin\QuestionTypeController::class, 'store'])->name('question.type.store');
        Route::post('/question-type/update/{question_type}', [\App\Http\Controllers\Api\Admin\QuestionTypeController::class, 'update'])->name('question.type.update');
        Route::delete('/question-type/delete/{question_type}', [\App\Http\Controllers\Api\Admin\QuestionTypeController::class, 'destroy'])->name('question.type.destroy');

        // Template
        Route::get('/templates', [\App\Http\Controllers\Api\Admin\TemplateController::class, 'index'])->name('template.list');
        Route::get('/templates/all', [\App\Http\Controllers\Api\Admin\TemplateController::class, 'all'])->name('template.all');
        Route::post('/template/store', [\App\Http\Controllers\Api\Admin\TemplateController::class, 'store'])->name('template.store');
        Route::get('/template/{template}', [\App\Http\Controllers\Api\Admin\TemplateController::class, 'show'])->name('template.show');
        Route::post('/template/update/{template}', [\App\Http\Controllers\Api\Admin\TemplateController::class, 'update'])->name('template.update');
        Route::delete('/template/delete/{template}', [\App\Http\Controllers\Api\Admin\TemplateController::class, 'destroy'])->name('template.destroy');

        // Workspace
        Route::get('/workspaces', [\App\Http\Controllers\Api\Admin\WorkspaceController::class, 'index'])->name('workspace.list');
        Route::get('/workspaces/all', [\App\Http\Controllers\Api\Admin\WorkspaceController::class, 'all'])->name('workspace.all');
        Route::post('/workspace/store', [\App\Http\Controllers\Api\Admin\WorkspaceController::class, 'store'])->name('workspace.store');
        Route::get('/workspace/{workspace}', [\App\Http\Controllers\Api\Admin\WorkspaceController::class, 'show'])->name('workspace.show');
        Route::post('/workspace/update/{workspace}', [\App\Http\Controllers\Api\Admin\WorkspaceController::class, 'update'])->name('workspace.update');
        Route::delete('/workspace/delete/{workspace}', [\App\Http\Controllers\Api\Admin\WorkspaceController::class, 'destroy'])->name('workspace.destroy');

        // Group
        Route::get('/groups', [\App\Http\Controllers\Api\Admin\GroupController::class, 'index'])->name('group.list');
        Route::get('/groups/all', [\App\Http\Controllers\Api\Admin\GroupController::class, 'all'])->name('group.all');
        Route::get('/group/{group}', [\App\Http\Controllers\Api\Admin\GroupController::class, 'show'])->name('group.show');
        Route::post('/group/update/{group}', [\App\Http\Controllers\Api\Admin\GroupController::class, 'update'])->name('group.update');
        Route::delete('/group/delete/{group}', [\App\Http\Controllers\Api\Admin\GroupController::class, 'destroy'])->name('group.destroy');
    });

Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'authenticate']);
