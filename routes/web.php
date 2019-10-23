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
    return redirect('login');
});

Route::get('/dashboard', function () {
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
Route::get('hapus-dokumen/{id}', 'DokumenController@delete');

Route::get('cari','CariDokController@index');
Route::get('prosescari','CariDokController@cari');
Route::get('hasilcari','CariDokController@hasilcari');
Route::get('detil-dokumen/{id}','CariDokController@detil');
//Route::get('/daftar-penyimpanan', function () {
//    return view('penyimpanan/daftarPenyimpanan');
//});

Route::get('/form-peminjaman2', 'PeminjamanController@coba');
Route::get('/form-peminjaman', 'PeminjamanController@index');
Route::get('/simpan-peminjaman', 'PeminjamanController@create');
Route::get('/daftar-peminjaman', 'PeminjamanController@daftar');
Route::get('/detil-peminjaman/{id}', 'PeminjamanController@show');
Route::get('/edit-peminjaman/{id}', 'PeminjamanController@edit');
Route::get('/update-peminjaman/{id}', 'PeminjamanController@update');
Route::get('/delete-peminjaman/{id}', 'PeminjamanController@destroy');

Route::get('/form-pengembalian', 'PengembalianController@index');
Route::get('/cari-pengembalian', 'PengembalianController@cari');
Route::get('/daftar-pengembalian', 'PengembalianController@daftar');
Route::get('/pengembalian', 'PengembalianController@kembali');

Route::get('/daftar-retensi', 'RetensiController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//karyawan
Route::get('/home-karyawan', 'KaryawanController@index');
Route::get('/form-pengajuan', 'KaryawanController@pengajuan');
Route::post('/proses-pengajuan', 'KaryawanController@prosesPengajuan');
Route::get('/daftar-pengajuan', 'KaryawanController@daftarPengajuan');
Route::get('/edit-pengajuan/{id}', 'KaryawanController@formEdit');
Route::get('/hapus-pengajuan/{id}', 'KaryawanController@hapus');