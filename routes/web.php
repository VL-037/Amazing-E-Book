<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EBookController;
use App\Http\Controllers\OrderController;
use App\Models\Order;
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

Route::get('/', [AccountController::class, 'home'])->name('home');
Route::get('/signup', [AccountController::class, 'signUp']);
Route::post('/signup', [AccountController::class, 'signUpStore']);
Route::get('/login', [AccountController::class, 'login']);
Route::post('/login', [AccountController::class, 'loginAuth']);
Route::get('/logout', [AccountController::class, 'logout'])->middleware('auth');

Route::get('/ebooks/{ebook_id}', [EBookController::class, 'detail'])->middleware('auth');
Route::post('/ebooks/{ebook_id}', [EBookController::class, 'addToOrder'])->middleware('auth');

Route::get('/cart', [OrderController::class, 'index'])->middleware('auth');
Route::delete('/cart/{ebook_id}', [OrderController::class, 'destroyOrderById'])->middleware('auth');
Route::delete('/cart', [OrderController::class, 'destroyAllOrders'])->middleware('auth');

Route::get('/profile', [AccountController::class, 'profile'])->middleware('auth');
Route::post('/profile', [AccountController::class, 'updateProfile'])->middleware('auth');

Route::get('/admins/accounts', [AccountController::class, 'index'])->middleware('auth', 'role:Admin');
Route::get('/admins/accounts/{account_id}', [AccountController::class, 'updateAccountPage'])->middleware('auth', 'role:Admin');
Route::post('/admins/accounts/{account_id}', [AccountController::class, 'updateAccount'])->middleware('auth', 'role:Admin');
Route::delete('/admins/accounts/{account_id}', [AccountController::class, 'destroyAccountById'])->middleware('auth', 'role:Admin');

Route::post('/set_lang', [AccountController::class, 'setLanguage']);