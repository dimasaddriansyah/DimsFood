<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {

    return view('welcome');
});

Route::get('/tugas/tambah', 'TugasController@tambah');
Route::post('/simpan', 'TugasController@simpan');
Route::get('/tugas/lihat/{tugas}', 'TugasController@lihat');

Route::get('2', function () {

    return view('coba');
});

Route::group(['middleware' => 'auth:admin'], function () {

    Route::get('/admin/index', 'DashboardAdminHome@index');

    //Menghitung Data di Dashboard
    Route::get('/admin/index', 'DashboardAdmin@tampil');

    //Data Pegawai
    Route::get('/admin/pengguna/index', 'PenggunaController@getPengguna');
    Route::get('/admin/pengguna/tambah', 'PenggunaController@tampilTambah');
    Route::post('/add-pengguna', 'PenggunaController@addPengguna');
    Route::get('/form-pengguna/{id}', 'PenggunaController@formPengguna');
    Route::post('/edit-pengguna/{id}', 'PenggunaController@editPengguna');
    Route::get('/delete-pengguna/{id}', 'PenggunaController@deletePengguna');
    Route::get('/pengguna/cari', 'PenggunaController@cari');

    //Data Barang
    Route::get('/admin/barang/index', 'BarangController@getBarang');
    Route::get('/admin/barang/tambah', 'BarangController@tampilTambah');
    Route::post('/add-barang', 'BarangController@addBarang');
    Route::get('/form-barang/{id}', 'BarangController@formBarang');
    Route::post('/edit-barang/{id}', 'BarangController@editBarang');
    Route::get('/delete-barang/{id}', 'BarangController@deleteBarang');
    Route::get('/barang/cari', 'BarangController@cari');

    //Laporan Laporan Transaksi
    Route::get('/admin/transaksi/index', 'TransaksiController@getTransaksi');
    Route::get('detail/{id}', 'TransaksiController@detail');
});

Route::group(['middleware' => 'auth:pengguna'], function () {

    Route::get('/pengguna/index', 'DashboardPenggunaController@index');
    Route::get('pesan/{id}', 'DashboardPenggunaController@tampilpesan');
    Route::post('pesan/{id}', 'DashboardPenggunaController@pesan');
    Route::get('check-out', 'DashboardPenggunaController@check_out');
    Route::delete('check-out/{id}', 'DashboardPenggunaController@delete');
    Route::get('konfirmasi-check-out', 'DashboardPenggunaController@konfirmasi');
    Route::get('history', 'DashboardPenggunaController@history');
    Route::get('history/{id}', 'DashboardPenggunaController@historydetail');

    Route::post('upload_bukti/{id}', 'DashboardPenggunaController@upload');
    Route::get('ubahakun/{id}', 'DashboardPenggunaController@ubahakun');
    Route::post('/pesananselesai/{id}', 'DashboardPenggunaController@pesananselesai');
});

Route::group(['middleware' => 'guest'], function () {

    Route::get('/masuk', 'login@index');
    Route::get('/register', 'login@register');
    Route::post('/kirimdata', 'login@masuk');
    Route::post('/kirimdataregister', 'login@masukregister');
});

Route::get('/keluar', 'login@keluar');
Route::get('/covid', 'InfoController@index');
