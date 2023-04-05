<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Employer\CompanyController;
use App\Http\Controllers\Employer\JobController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'home']);
Route::get('/jobs', [IndexController::class, 'jobs']);
Route::get('/jobs/{job}', [IndexController::class, 'viewJob']);
Route::get('/jobs/{job}/applynow', [IndexController::class, 'applynowView']);

Route::post('/jobs/{job}/applynow', [IndexController::class, 'applynow']);
Route::get('/alerts/applysuccess', [IndexController::class, 'applySuccessAlert']);
Route::get("/myapplications", [IndexController::class, 'myapplications']);

// authentication
Route::view('login', 'pages.login');
Route::view('signup', 'pages.signup');
Route::post('login', [AuthController::class, 'login']);
Route::post('signup', [AuthController::class, 'signup']);
Route::post('logout', [AuthController::class, 'logout']);

// employer

Route::group(['prefix' => '/employer', 'middleware' => ['mauth', 'employer']], function () {
    Route::get('/dashboard', [EmployerController::class, 'dashboard']);

    Route::resources([
        '/companies' => CompanyController::class,
        '/jobs' => JobController::class,
        '/applications' => \App\Http\Controllers\Employer\ApplicationController::class,
    ]);

});


// profile 
Route::group(['prefix' => '/profile', 'middleware' => 'mauth'], function () {
    Route::get('', [ProfileController::class, 'index']);
    Route::get('edit', [ProfileController::class, 'edit']);
    Route::put('update', [ProfileController::class, 'update']);
    Route::put('changepassword', [ProfileController::class, 'changepassword']);
    Route::put('converttoemployer', [ProfileController::class, 'converttoemployer']);
});