<?php

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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/jenis-dokumen', function () {
    return view('jenisDokumen');
});

Route::get('/Lokasi-simpan', function () {
    return view('lokasiSimpan');
});

Route::get('/jra', function () {
    return view('jra');
});

Route::get('/penyimpanan', function () {
    return view('penyimpanan/penyimpanan');
});

Route::get('/daftar-penyimpanan', function () {
    return view('penyimpanan/daftarPenyimpanan');
});