<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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
    return view('welcome');
});

Route::resource('/frame','FrameController')->middleware('auth');
Route::resource('/users','UsersController')->middleware('can:manage-users');
Route::resource('/dash','DashboardController')->middleware('auth');

/**
 * Route data master
 */
Route::get('/fakultas/fakultas','FakultasController@fakultas')->name('fakultas.fakultas');
Route::post('/fakultas/store','FakultasController@fakultas_store')->name('fakultas.store');
Route::get('/fakultas/destroy/{fakultas}','FakultasController@fakultas_destroy')->name('fakultas.destroy');

Route::get('/prodi/prodi','FakultasController@prodi')->name('prodi.prodi');
Route::post('/prodi/store','FakultasController@prodi_store')->name('prodi.store');
Route::get('/prodi/destroy/{prodi}','FakultasController@prodi_destroy')->name('prodi.destroy');

Route::get('/strata/strata','FakultasController@strata')->name('strata.strata');
Route::post('/strata/store','FakultasController@strata_store')->name('strata.store');
Route::get('/strata/destroy/{id_strara}','FakultasController@strata_destroy')->name('strata.destroy');
Route::get('/strata/edit/{id_stara}','FakultasController@strata_edit')->name('strata.edit');

Route::get('/kelas/kelas','FakultasController@kelas')->name('kelas.kelas');
Route::post('/kelas/store','FakultasController@kelas_store')->name('kelas.store');
Route::get('/kelas/destroy/{kelas}','FakultasController@kelas_destroy')->name('kelas.destroy');

/**
 * Route PMB
 */
Route::get('/pengaturan/pendaftaran-pmb','PmbController@pendaftaran_pmb');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Pendaftaran Online
Route::get('operator/pendaftaran/aktivasi-mhs','PendaftaranOnlineController@aktivasi_calon_mhs');
Route::get('operator/pendaftaran/tampil-pendaftar/{id}','PendaftaranOnlineController@show_data_pendaftar')->name('pendaftar.tampil','{id}');
Route::post('operator/pendaftaran/confirm-pembayaran-pmb','PendaftaranOnlineController@confirm_pembayaran_pmb');
Route::get('operator/pendaftaran/info-registrasi','PendaftaranOnlineController@info_registrasi');

//Calon Mhasiswa
Route::get('operator/calon-mhs','CalonMhsController@calon_mhs');
