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
        Route::get('/hospitals', [\App\Http\Controllers\Api\Admin\HospitalController::class, 'index'])->name('admin.hospital.list');
        Route::get('/hospitals/all', [\App\Http\Controllers\Api\Admin\HospitalController::class, 'all'])->name('admin.hospital.all');
        Route::post('/hospital/store', [\App\Http\Controllers\Api\Admin\HospitalController::class, 'store'])->name('admin.hospital.store');
        Route::get('/hospital/{hospital}', [\App\Http\Controllers\Api\Admin\HospitalController::class, 'show'])->name('admin.hospital.show');
        Route::post('/hospital/update/{hospital}', [\App\Http\Controllers\Api\Admin\HospitalController::class, 'update'])->name('admin.hospital.update');
        Route::delete('/hospital/delete/{hospital}', [\App\Http\Controllers\Api\Admin\HospitalController::class, 'destroy'])->name('admin.hospital.destroy');

        // Clinic
        Route::get('/clinics', [\App\Http\Controllers\Api\Admin\ClinicController::class, 'index'])->name('admin.clinic.list');
        Route::get('/clinics/all', [\App\Http\Controllers\Api\Admin\ClinicController::class, 'all'])->name('admin.clinic.all');
        Route::post('/clinic/store', [\App\Http\Controllers\Api\Admin\ClinicController::class, 'store'])->name('admin.clinic.store');
        Route::get('/clinic/{clinic}', [\App\Http\Controllers\Api\Admin\ClinicController::class, 'show'])->name('admin.clinic.show');
        Route::post('/clinic/update/{clinic}', [\App\Http\Controllers\Api\Admin\ClinicController::class, 'update'])->name('admin.clinic.update');
        Route::delete('/clinic/delete/{clinic}', [\App\Http\Controllers\Api\Admin\ClinicController::class, 'destroy'])->name('admin.clinic.destroy');

        // User
        Route::get('/users', [\App\Http\Controllers\Api\Admin\UserController::class, 'index'])->name('admin.user.list');
        Route::get('/users/all', [\App\Http\Controllers\Api\Admin\UserController::class, 'all'])->name('admin.user.all');
        Route::post('/user/store', [\App\Http\Controllers\Api\Admin\UserController::class, 'store'])->name('admin.user.store');
        Route::get('/user/{user}', [\App\Http\Controllers\Api\Admin\UserController::class, 'show'])->name('admin.user.show');
        Route::post('/user/update/{user}', [\App\Http\Controllers\Api\Admin\UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/user/delete/{user}', [\App\Http\Controllers\Api\Admin\UserController::class, 'destroy'])->name('admin.user.destroy');

        // Role
        Route::get('/roles', [\App\Http\Controllers\Api\Admin\RoleController::class, 'index'])->name('admin.role.list');
        Route::get('/roles/all', [\App\Http\Controllers\Api\Admin\RoleController::class, 'all'])->name('admin.role.all');
        Route::post('/role/store', [\App\Http\Controllers\Api\Admin\RoleController::class, 'store'])->name('admin.role.store');
        Route::get('/role/{role}', [\App\Http\Controllers\Api\Admin\RoleController::class, 'show'])->name('admin.role.show');
        Route::post('/role/update/{role}', [\App\Http\Controllers\Api\Admin\RoleController::class, 'update'])->name('admin.role.update');
        Route::delete('/role/delete/{role}', [\App\Http\Controllers\Api\Admin\RoleController::class, 'destroy'])->name('admin.role.destroy');

        // Ability
        Route::get('/abilities/all', [\App\Http\Controllers\Api\Admin\AbilityController::class, 'all']);

        // Question
        Route::get('/question-types', [\App\Http\Controllers\Api\Admin\QuestionTypeController::class, 'index'])->name('admin.question.type.index');
        Route::post('/question-type/store', [\App\Http\Controllers\Api\Admin\QuestionTypeController::class, 'store'])->name('admin.question.type.store');
        Route::post('/question-type/update/{question_type}', [\App\Http\Controllers\Api\Admin\QuestionTypeController::class, 'update'])->name('admin.question.type.update');
        Route::delete('/question-type/delete/{question_type}', [\App\Http\Controllers\Api\Admin\QuestionTypeController::class, 'destroy'])->name('admin.question.type.destroy');

        // Template
        Route::get('/templates', [\App\Http\Controllers\Api\Admin\TemplateController::class, 'index'])->name('admin.template.list');
        Route::get('/templates/all', [\App\Http\Controllers\Api\Admin\TemplateController::class, 'all'])->name('admin.template.all');
        Route::post('/template/store', [\App\Http\Controllers\Api\Admin\TemplateController::class, 'store'])->name('admin.template.store');
        Route::get('/template/{template}', [\App\Http\Controllers\Api\Admin\TemplateController::class, 'show'])->name('admin.template.show');
        Route::post('/template/update/{template}', [\App\Http\Controllers\Api\Admin\TemplateController::class, 'update'])->name('admin.template.update');
        Route::delete('/template/delete/{template}', [\App\Http\Controllers\Api\Admin\TemplateController::class, 'destroy'])->name('admin.template.destroy');

        // Workspace
        Route::get('/workspaces', [\App\Http\Controllers\Api\Admin\WorkspaceController::class, 'index'])->name('admin.workspace.list');
        Route::get('/workspaces/all', [\App\Http\Controllers\Api\Admin\WorkspaceController::class, 'all'])->name('admin.workspace.all');
        Route::post('/workspace/store', [\App\Http\Controllers\Api\Admin\WorkspaceController::class, 'store'])->name('admin.workspace.store');
        Route::get('/workspace/{workspace}', [\App\Http\Controllers\Api\Admin\WorkspaceController::class, 'show'])->name('admin.workspace.show');
        Route::post('/workspace/update/{workspace}', [\App\Http\Controllers\Api\Admin\WorkspaceController::class, 'update'])->name('admin.workspace.update');
        Route::delete('/workspace/delete/{workspace}', [\App\Http\Controllers\Api\Admin\WorkspaceController::class, 'destroy'])->name('admin.workspace.destroy');

        // Group
        Route::get('/groups', [\App\Http\Controllers\Api\Admin\GroupController::class, 'index'])->name('admin.group.list');
        Route::get('/groups/all', [\App\Http\Controllers\Api\Admin\GroupController::class, 'all'])->name('admin.group.all');
        Route::get('/group/{group}', [\App\Http\Controllers\Api\Admin\GroupController::class, 'show'])->name('admin.group.show');
        Route::post('/group/update/{group}', [\App\Http\Controllers\Api\Admin\GroupController::class, 'update'])->name('admin.group.update');
        Route::delete('/group/delete/{group}', [\App\Http\Controllers\Api\Admin\GroupController::class, 'destroy'])->name('admin.group.destroy');
    });

Route::middleware(['auth:sanctum', App\Http\Middleware\CheckAbility::class])
    ->group(function () {

        // Workspace
        Route::get('/workspaces', [\App\Http\Controllers\Api\App\WorkspaceController::class, 'index'])->name('app.workspace.list');
        Route::post('/workspace/store', [\App\Http\Controllers\Api\App\WorkspaceController::class, 'store'])->name('app.workspace.store');
        Route::get('/workspace/{workspace}', [\App\Http\Controllers\Api\App\WorkspaceController::class, 'show'])->name('app.workspace.show');
        Route::post('/workspace/update/{workspace}', [\App\Http\Controllers\Api\App\WorkspaceController::class, 'update'])->name('app.workspace.update');
        Route::delete('/workspace/delete/{workspace}', [\App\Http\Controllers\Api\App\WorkspaceController::class, 'destroy'])->name('app.workspace.destroy');

        // Group
        Route::get('/group/{group}', [\App\Http\Controllers\Api\App\GroupController::class, 'show'])->name('app.group.show');
        Route::post('/group/update/{group}', [\App\Http\Controllers\Api\App\GroupController::class, 'update'])->name('app.group.update');
        Route::delete('/group/delete/{group}', [\App\Http\Controllers\Api\App\GroupController::class, 'destroy'])->name('app.group.destroy');

        // Question
        Route::get('/question-types', [\App\Http\Controllers\Api\App\QuestionTypeController::class, 'index'])->name('app.question.type.index');
        Route::post('/question-type/store', [\App\Http\Controllers\Api\App\QuestionTypeController::class, 'store'])->name('app.question.type.store');
        Route::post('/question-type/update/{question_type}', [\App\Http\Controllers\Api\App\QuestionTypeController::class, 'update'])->name('app.question.type.update');
        Route::delete('/question-type/delete/{question_type}', [\App\Http\Controllers\Api\App\QuestionTypeController::class, 'destroy'])->name('app.question.type.destroy');

        // Template
        Route::get('/templates', [\App\Http\Controllers\Api\App\TemplateController::class, 'index'])->name('app.template.list');
        Route::get('/templates/all', [\App\Http\Controllers\Api\App\TemplateController::class, 'all'])->name('app.template.all');
        Route::post('/template/store', [\App\Http\Controllers\Api\App\TemplateController::class, 'store'])->name('app.template.store');
        Route::get('/template/{template}', [\App\Http\Controllers\Api\App\TemplateController::class, 'show'])->name('app.template.show');
        Route::post('/template/update/{template}', [\App\Http\Controllers\Api\App\TemplateController::class, 'update'])->name('app.template.update');
        Route::delete('/template/delete/{template}', [\App\Http\Controllers\Api\App\TemplateController::class, 'destroy'])->name('app.template.destroy');

        // Patient
        Route::get('/surveys', [\App\Http\Controllers\Api\App\SurveyController::class, 'index'])->name('app.survey.list');
        Route::get('/survey/all', [\App\Http\Controllers\Api\App\SurveyController::class, 'all'])->name('app.survey.all');
        Route::post('/survey/store', [\App\Http\Controllers\Api\App\SurveyController::class, 'store'])->name('app.survey.store');
        Route::get('/survey/{survey}', [\App\Http\Controllers\Api\App\SurveyController::class, 'show'])->name('app.survey.show');
        Route::post('/survey/update/{survey}', [\App\Http\Controllers\Api\App\SurveyController::class, 'update'])->name('app.survey.update');
        Route::delete('/survey/delete/{survey}', [\App\Http\Controllers\Api\App\SurveyController::class, 'destroy'])->name('app.survey.destroy');
    });

Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'authenticate']);
