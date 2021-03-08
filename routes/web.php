<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DrinksController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('users', [AdminController::class, 'getUsers'])->name('users');
    Route::get('addProducts', [AdminController::class, 'addProducts'])->name('addProducts');
    Route::post('productsStore', [AdminController::class, 'productsStore'])->name('productsStore');
    Route::resource('foods', FoodsController::class);
    Route::resource('drinks', DrinksController::class);
    Route::resource('transactions', TransactionController::class);
    Route::resource('payments', PaymentController::class);

});

Route::group(['middleware' => 'auth:user'], function () {
});

Route::get('/', [UserController::class, 'home'])->name('user');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('loginPost', [AuthController::class, 'loginPost'])->name('loginPost');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('registerPost', [AuthController::class, 'registerPost'])->name('registerPost');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
