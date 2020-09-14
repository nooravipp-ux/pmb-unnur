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
Route::get('/fakultas/get-data-fakultas','FakultasController@get_data_fakultas');

Route::get('/prodi/prodi','FakultasController@prodi')->name('prodi.prodi');
Route::post('/prodi/store','FakultasController@prodi_store')->name('prodi.store');
Route::get('/prodi/destroy/{prodi}','FakultasController@prodi_destroy')->name('prodi.destroy');
Route::get('/fakultas/get-data-prodi','FakultasController@get_data_prodi');
Route::get('/prodi/get_data_jenjang_prodi','FakultasController@get_data_jenjang_prodi');
Route::get('/prodi/get_data_prodi','FakultasController@get_data_prodi');

Route::get('/strata/strata','FakultasController@strata')->name('strata.strata');
Route::post('/strata/store','FakultasController@strata_store')->name('strata.store');
Route::get('/strata/destroy/{strata}','FakultasController@strata_destroy')->name('strata.destroy');

Route::get('/kelas/kelas','FakultasController@kelas')->name('kelas.kelas');
Route::post('/kelas/store','FakultasController@kelas_store')->name('kelas.store');
Route::get('/kelas/destroy/{kelas}','FakultasController@kelas_destroy')->name('kelas.destroy');
Route::get('/kelas/get-data-kelas','FakultasController@get_data_kelas');

/**
 * Route PMB
 */
// nim
Route::get('/pmb/nim','PmbController@nim_index')->name('nim.pmb');
Route::get('/pmb/nim/destroy/{nim}','PmbController@nim_destroy')->name('nim.destroy');
Route::post('/pmb/jadwal/store','PmbController@nim_store')->name('nim.pmb.store');
// end nim
Route::get('/pengaturan/pendaftaran-pmb','PmbController@pendaftaran_pmb');
Route::post('/pengaturan/pendaftaran-pmb/simpan-data-pmb','PmbController@simpan_data_pmb');
Route::post('/pengaturan/pendaftaran-pmb/delete-data/{id}','PmbController@destroy')->name('pmb.delete','{id}');
Route::get('/pengaturan/pendaftaran-pmb/biaya-registrasi','PmbController@biaya_registrasi');
Route::post('/pengaturan/pendaftaran-pmb/simpan-biaya-registrasi','PmbController@simpan_biaya_registrasi');
Route::post('/pengaturan/pendaftaran-pmb/delete-biaya-registrasi/{id}','PmbController@delete_biaya_registrasi')->name('biaya.delete','{id}');
Route::get('/pengaturan/pendaftaran-pmb/get-data-pmb','PmbController@get_data_pmb');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Pendaftaran Online
Route::get('operator/pendaftaran/aktivasi-mhs','PendaftaranOnlineController@aktivasi_calon_mhs');
Route::get('operator/pendaftaran/tampil-pendaftar/{id}','PendaftaranOnlineController@show_data_pendaftar')->name('pendaftar.tampil','{id}');
Route::post('operator/pendaftaran/confirm-pembayaran-pmb','PendaftaranOnlineController@confirm_pembayaran_pmb');
Route::get('operator/pendaftaran/info-registrasi','PendaftaranOnlineController@info_registrasi');
//jadwal ujian PMB
Route::get('/operator/jadwal-ujian','JadwalUjianController@jadwal_ujian');
Route::post('/operator/jadwal-ujian/simpan','JadwalUjianController@simpan_jadwal_ujian');
Route::get('/operator/entry-nilai-ujian','JadwalUjianController@entry_nilai_ujian');
Route::get('/operator/entry-nilai-ujian/get-data-peserta-ujian','JadwalUjianController@get_data_peserta_ujian');
Route::get('/operator/entry-nilai-ujian/load-data-peserta-ujian','JadwalUjianController@load_data_peserta_ujian');
Route::post('/operator/entry-nilai-ujian/update-nilai-peserta-ujian','JadwalUjianController@update_nilai_ujian');

Route::get('/daftar_awal','PendaftaranOnlineController@daftar_awal');
Route::get('/get_prodi','PendaftaranOnlineController@get_prodi')->name('get.prodi');
Route::get('/get_strata','PendaftaranOnlineController@get_strata')->name('get.strata');
Route::get('/get_kelas','PendaftaranOnlineController@get_kelas')->name('get.kelas');
Route::get('/get_biaya','PendaftaranOnlineController@get_biaya')->name('get.biaya');
Route::post('/daftar_awal/simpan_calonmhs','PendaftaranOnlineController@simpan_calonmhs')->name('simpan.calonmhs');
Route::get('/daftar_awal/upload','PendaftaranOnlineController@daftar_awal_upload');
//Route::get('/daftar_awal/upload/get_data','PendaftaranOnlineController@get_data_calonmhs')->name('get.datacalonmhs');
Route::get('/daftar_awal/upload/get_data','CalonMhsController@get_data_calonmhs')->name('get.datacalonmhs');

//Calon Mhasiswa
Route::get('/calon-mahasiswa/formulir','CalonMhsController@formulir');
Route::post('/calon-mahasiswa/formulir/update-formulir','CalonMhsController@update_formulir')->name('update.formulir');
Route::get('/calon-mahasiswa/form-biodata','CalonMhsController@form_biodata');
Route::get('/calon-mahasiswa/form-document','CalonMhsController@form_up_doc');
Route::post('/calon-mahasiswa/form-biodata/simpan-data-biodata','CalonMhsController@update_form_biodata');
Route::get('/calon-mahasiswa/form-upload','CalonMhsController@form_upload');
Route::post('/calon-mahasiswa/form-upload/upload_bukti','CalonMhsController@update_bukti_pembayaran')->name('upload.bukti');
Route::post('/calon-mahasiswa/form-document/upload_document','CalonMhsController@update_form_document')->name('upload.document');
Route::get('/calon-mahasiswa/form-document/get_document','CalonMhsController@get_document')->name('get.document');


