<?php

use App\Http\Controllers\AuthController;
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

Route::view('login', 'pages.login');
Route::view('signup', 'pages.signup');
Route::post('login', [AuthController::class,'login']);
Route::post('signup', [AuthController::class,'signup']);