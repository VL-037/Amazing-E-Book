<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AccountController::class, 'home']);
Route::get('/signup', [AccountController::class, 'signUp']);
Route::post('/signup', [AccountController::class, 'signUpStore']);
Route::get('/login', [AccountController::class, 'login']);
Route::post('/login', [AccountController::class, 'loginAuth']);
Route::get('/logout', [AccountController::class, 'logout']);