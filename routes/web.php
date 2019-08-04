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
Route::post('edit-karyawan','KaryawanController@update');
Route::get('delete-karyawan/{nip}','KaryawanController@delete');
Route::get('show/{nip}','KaryawanController@show');


Route::get('/lokasi', 'LokasiController@index');
Route::post('/lokasi-simpan', 'LokasiController@simpan');
Route::post('/update-lokasi', 'LokasiController@update');
Route::get('/hapus-lokasi/{id}', 'LokasiController@delete');

Route::get('/penyimpanan', 'DokumenController@index');
Route::get('dynamic/{id_jra}', 'DokumenController@show');
Route::post('simpan-dokumen', 'DokumenController@store');
Route::get('lokasi-penyimpanan', 'DokumenController@lokasiSimpan');
Route::get('daftar-penyimpanan', 'DokumenController@daftar');
Route::get('detil-penyimpanan/{id}', 'DokumenController@detil');
Route::get('form-edit-penyimpanan/{id}', 'DokumenController@edit');
Route::post('update-dokumen', 'DokumenController@update');


//Route::get('/daftar-penyimpanan', function () {
//    return view('penyimpanan/daftarPenyimpanan');
//});

Route::get('/form-peminjaman', function () {
    return view('peminjaman/formPeminjaman');
});

Route::get('/form-pengembalian', function () {
    return view('pengembalian/pengembalian');
});