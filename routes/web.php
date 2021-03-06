<?php

use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {

    return view('welcome');
});

Route::group(['middleware' => 'auth:admin'], function () {

    //Dashboard
    Route::get('adminDashboard', [DashboardAdmin::class, 'tampil'])->name('admin.dashboard');
    //Users
    Route::get('users', [DashboardAdmin::class, 'getUsers'])->name('users');
    //Foods
    Route::resource('foods', FoodsController::class);
    //Drinks
    Route::resource('drinks', DrinksController::class);
    //Categories
    Route::resource('categories', BarangController::class);
    //Transaction
    Route::get('/admin/transaksi/index', 'TransaksiController@getTransaksi')->name('admin.transaksi');
    Route::get('/admin/transaksi-detail/{id}', 'TransaksiController@detail')->name('admin.transaksiDetail');
    Route::get('/admin/transaksi/confirmTransaksi', 'TransaksiController@getconfirmTransaksi')->name('admin.confirmTransaksi');

    //Transaksi
    Route::post('/pesananKonfirmasi/{id}', 'TransaksiController@konfirmasi')->name('admin.transaksi.konfirmasi');
    Route::post('/pesananBatal/{id}', 'TransaksiController@batal')->name('admin.transaksi.batal');
    Route::post('/pesananSelesai/{id}', 'TransaksiController@selesai')->name('admin.transaksi.selesai');
});

Route::group(['middleware' => 'auth:pengguna'], function () {

    Route::get('/pengguna/index', 'DashboardPenggunaController@index')->name('pengguna');
    Route::get('pesan/{id}', 'DashboardPenggunaController@tampilpesan');
    Route::post('pesan/{id}', 'DashboardPenggunaController@pesan');
    Route::get('check-out', 'DashboardPenggunaController@check_out');
    Route::delete('check-out/{id}', 'DashboardPenggunaController@delete');
    Route::get('konfirmasi-check-out', 'DashboardPenggunaController@konfirmasi');
    Route::get('history', 'DashboardPenggunaController@history');
    Route::get('history/{id}', 'DashboardPenggunaController@historydetail');

    Route::post('upload_bukti/{id}', 'DashboardPenggunaController@upload');
    Route::get('ubahakun', 'DashboardPenggunaController@ubahakun');
    Route::get('ubahPassword', 'DashboardPenggunaController@ubahPassword');
    Route::post('/pesananselesai/{id}', 'DashboardPenggunaController@pesananselesai');
});

Route::group(['middleware' => 'guest'], function () {

    Route::get('/login', [login::class, 'login'])->name('login');
    Route::post('/loginPost', [login::class, 'loginPost'])->name('loginPost');
    Route::get('/register', [login::class, 'register'])->name('register');
    Route::post('/registerPost', [login::class, 'registerPost'])->name('registerPost');
});

Route::get('/logout', [login::class, 'keluar'])->name('logout');
