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
 * Route data
 */
Route::get('/fakultas/fakultas','FakultasController@fakultas')->name('fakultas.fakultas');
Route::get('/fakultas/destroy/{pmb_fakultas}','FakultasController@fakultas_destroy')->name('fakultas.destroy');
Route::post('/fakultas/store','FakultasController@fakultas_store')->name('fakultas.store');
Route::get('/fakultas/prodi','FakultasController@prodi')->name('fakultas.prodi');

/**
 * Route PMB
 */
Route::resource('/PMB', 'PmbController');

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
