<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DrinksController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductsController;
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
    Route::get('products', [ProductsController::class, 'index'])->name('products');
    Route::get('productsCritical', [ProductsController::class, 'critical'])->name('products.critical');
    Route::get('productsSold', [ProductsController::class, 'sold'])->name('products.sold');
    Route::resource('foods', FoodsController::class);
    Route::resource('drinks', DrinksController::class);
    Route::resource('transactions', TransactionController::class);
    Route::resource('payments', PaymentController::class);
    Route::post('confrimTransaction/{payment}', [PaymentController::class, 'confirmTransaction'])->name('payments.confirm');
    Route::post('rejectTransaction/{payment}', [PaymentController::class, 'rejectTransaction'])->name('payments.reject');
});

Route::group(['middleware' => 'auth:user'], function () {
});

Route::get('/', [UserController::class, 'home'])->name('user');
Route::get('foods-menu', [UserController::class, 'foodsMenu'])->name('user.foods');
Route::get('drinks-menu', [UserController::class, 'drinksMenu'])->name('user.drinks');
Route::get('detail-products/{product}', [UserController::class, 'detailProducts'])->name('user.detailProducts');
Route::post('addCart/{product}', [UserController::class, 'addCart'])->name('user.addCart');
Route::get('cart', [UserController::class, 'cart'])->name('user.cart');
Route::delete('cart/{transactionDetail}', [UserController::class, 'deleteCart'])->name('user.deleteCart');
Route::post('checkout', [UserController::class, 'checkout'])->name('user.checkout');
Route::get('transaction-history', [UserController::class, 'history'])->name('user.history');
Route::get('transaction-history/{transactionDetail}', [UserController::class, 'historyDetails'])->name('user.historyDetails');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('loginPost', [AuthController::class, 'loginPost'])->name('loginPost');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('registerPost', [AuthController::class, 'registerPost'])->name('registerPost');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
