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

Route::get('/jenis-dokumen', 'JenisDokumenController@FormJenisData');
Route::post('/simpan', 'JenisDokumenController@Simpan');
Route::post('/edit', 'JenisDokumenController@Update');
Route::get('/delete/{no_takah}', 'JenisDokumenController@Delete');

Route::get('/jra', 'JRAController@index');
Route::post('/simpan-jra', 'JRAController@Simpan');
Route::post('/edit-jra', 'JRAController@Update');
Route::get('/delete-jra/{id}', 'JRAController@Delete');

Route::get('karyawan','KaryawanController@index');
Route::post('simpan-karyawan','KaryawanController@simpan');
Route::get('delete-karyawan/{nip}','KaryawanController@delete');

Route::get('/Lokasi-simpan', function () {
    return view('lokasiSimpan');
});

Route::get('/penyimpanan', function () {
    return view('penyimpanan/penyimpanan');
});

Route::get('/daftar-penyimpanan', function () {
    return view('penyimpanan/daftarPenyimpanan');
});

Route::get('/form-peminjaman', function () {
    return view('peminjaman/formPeminjaman');
});

Route::get('/form-pengembalian', function () {
    return view('pengembalian/pengembalian');
});