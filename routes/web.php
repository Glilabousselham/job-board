<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\IndexController;
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
Route::get('/jobs/{job}/applynow', [IndexController::class, 'applynow']);

Route::post('/jobs/{job}/applynow', [ApplicationController::class, 'applynow']);
Route::get('/alerts/applysuccess', [ApplicationController::class, 'applySuccessAlert']);
Route::get("/myapplications",[ApplicationController::class, 'myapplications']);

// authentication
Route::view('login', 'pages.login');
Route::view('signup', 'pages.signup');
Route::post('login', [AuthController::class, 'login']);
Route::post('signup', [AuthController::class, 'signup']);
Route::post('logout', [AuthController::class, 'logout']);

// employer
Route::get('employer', [EmployerController::class, 'dashboard']);