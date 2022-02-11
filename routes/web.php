<?php

use App\Http\Controllers\AccountController;
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

Route::get('/', [AccountController::class, 'home']);
Route::get('/signup', [AccountController::class, 'signUp']);
Route::post('/signup', [AccountController::class, 'signUpStore']);
Route::get('/login', [AccountController::class, 'login']);
Route::post('/login', [AccountController::class, 'loginAuth']);
Route::get('/logout', [AccountController::class, 'logout']);

Route::get('/ebooks/{ebook_id}', [EBookController::class, 'detail']);
Route::post('/ebooks/{ebook_id}', [EBookController::class, 'addToOrder']);

Route::get('/cart', [OrderController::class, 'index']);
Route::delete('/cart/{ebook_id}', [OrderController::class, 'destroyOrderById']);
Route::delete('/cart', [OrderController::class, 'destroyAllOrders']);