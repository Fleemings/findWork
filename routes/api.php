<?php

use App\Http\Controllers\API\ApplicantController as APIApplicantController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\EducationController;
use App\Http\Controllers\API\ExperienceController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\TecnologyController;
use App\Http\Controllers\Auth\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication Public Routes

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

// Protected Routes

Route::group(['middleware' => ['auth:sanctum']], function () {

    // Authentication Routes

    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/user/{id}', [UserController::class, 'show']);

    // Applicant CRUD Routes

    Route::get('/applicant/all', [APIApplicantController::class, 'index']);
    Route::post('/applicant/store', [APIApplicantController::class, 'store']);
    Route::get('/applicant/{id}', [APIApplicantController::class, 'show']);
    Route::patch('/applicant/update/{id}', [APIApplicantController::class, 'update']);
    Route::post('/applicant/delete/{id}', [APIApplicantController::class, 'destroy']);

    // Company CRUD Routes

    Route::get('/company/all', [CompanyController::class, 'index']);
    Route::post('/company/store', [CompanyController::class, 'store']);
    Route::get('/company/{id}', [CompanyController::class, 'show']);
    Route::patch('/company/update/{id}', [CompanyController::class, 'update']);
    Route::post('/company/delete/{id}', [CompanyController::class, 'destroy']);

    // Education CRUD Routes

    Route::get('/education/all', [EducationController::class, 'index']);
    Route::post('/education/store', [EducationController::class, 'store']);
    Route::get('/education/{id}', [EducationController::class, 'show']);
    Route::patch('/education/update/{id}', [EducationController::class, 'update']);
    Route::post('/education/delete/{id}', [EducationController::class, 'destroy']);

    // Experience CRUD Routes

    Route::get('/experience/all', [ExperienceController::class, 'index']);
    Route::post('/experience/store', [ExperienceController::class, 'store']);
    Route::get('/experience/{id}', [ExperienceController::class, 'show']);
    Route::patch('/experience/update/{id}', [ExperienceController::class, 'update']);
    Route::post('/experience/delete/{id}', [ExperienceController::class, 'destroy']);

    // Role CRUD Routes

    Route::get('/role/all', [RoleController::class, 'index']);
    Route::post('/role/store', [RoleController::class, 'store']);
    Route::get('/role/{id}', [RoleController::class, 'show']);
    Route::patch('/role/update/{id}', [RoleController::class, 'update']);
    Route::post('/role/delete/{id}', [RoleController::class, 'destroy']);

    // Technology CRUD Routes

    Route::get('/technology/all', [TecnologyController::class, 'index']);
    Route::post('/technology/store', [TecnologyController::class, 'store']);
    Route::get('/technology/{id}', [TecnologyController::class, 'show']);
    Route::patch('/technology/update/{id}', [TecnologyController::class, 'update']);
    Route::post('/technology/delete/{id}', [TecnologyController::class, 'destroy']);
});
