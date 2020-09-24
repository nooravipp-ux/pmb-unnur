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

Route::get('/get-data-pendaftar-per-tahun','DashboardController@get_data_register_per_year');
Route::get('/get-data-pendaftar-per-gelombang','DashboardController@get_data_register_per_gelombang');

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
 * set Email
 */
Route::get('setting/email','PengumumanController@index')->name('set.email');
Route::get('setting/email/sebar/{id}','PengumumanController@sebar')->name('set.email.sebar');
Route::post('setting/email/store','PengumumanController@store')->name('set.email.store');
Route::post('setting/email/{id}/update','PengumumanController@update')->name('set.email.update');
Route::get('setting/email/destroy/{set_email}','PengumumanController@destroy')->name('set.email.destroy');

Route::get('pengaturan/pengumuman','PengumumanController@mading_pengunguman');


/**
 * Route PMB
 */
// nim
Route::get('/pmb/nim','PmbController@nim_index')->name('nim.pmb');
Route::get('/pmb/nim/destroy/{nim}','PmbController@nim_destroy')->name('nim.destroy');
Route::post('/pmb/jadwal/store','PmbController@nim_store')->name('nim.pmb.store');
Route::get('/update-status-pmb','PmbController@update_status_pmb');
Route::get('/get-data-gelombnag-opened','PmbController@get_data_gelombang_opened');
// end nim
Route::get('/pengaturan/pendaftaran-pmb','PmbController@pendaftaran_pmb');
Route::post('/pengaturan/pendaftaran-pmb/simpan-data-pmb','PmbController@simpan_data_pmb');
Route::post('/pengaturan/pendaftaran-pmb/delete-data/{id}','PmbController@destroy')->name('pmb.delete','{id}');
Route::get('/pengaturan/pendaftaran-pmb/biaya-registrasi','PmbController@biaya_registrasi');
Route::post('/pengaturan/pendaftaran-pmb/simpan-biaya-registrasi','PmbController@simpan_biaya_registrasi');
Route::post('/pengaturan/pendaftaran-pmb/delete-biaya-registrasi/{id}','PmbController@delete_biaya_registrasi')->name('biaya.delete','{id}');
Route::get('/pengaturan/pendaftaran-pmb/get-data-pmb','PmbController@get_data_pmb');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Pendaftaran Online
Route::get('operator/pendaftaran/aktivasi-mhs','PendaftaranOnlineController@aktivasi_calon_mhs');
Route::get('operator/pendaftaran/tampil-pendaftar/{id}','PendaftaranOnlineController@show_data_pendaftar')->name('pendaftar.tampil','{id}');
Route::get('operator/pendaftaran/aktivasi-mhs/cetak_kwitansi/{id}','PendaftaranOnlineController@cetak_kwitansi_regis')->name('cetak.kwitansi','{id}');
Route::post('operator/pendaftaran/confirm-pembayaran-pmb','PendaftaranOnlineController@confirm_pembayaran_pmb');
Route::get('operator/pendaftaran/info-registrasi','PendaftaranOnlineController@info_registrasi');
Route::get('operator/pendaftaran/detail-info-registrasi/{id}','PendaftaranOnlineController@detail_info_registrasi')->name('detail.register','{id}');
Route::get('/count-total-register','PendaftaranOnlineController@count_total_register');
Route::get('/count-today-register','PendaftaranOnlineController@count_today_register');
Route::get('/count-register-confirmed','PendaftaranOnlineController@count_register_confirmed');

Route::get('/operator/pendaftaran/mahasiswa-lolos-seleksi','PendaftaranOnlineController@mhs_lolos_seleksi');


//jadwal ujian PMB
Route::get('/operator/jadwal-ujian','JadwalUjianController@jadwal_ujian');
Route::post('/operator/jadwal-ujian/simpan','JadwalUjianController@simpan_jadwal_ujian');
Route::get('/operator/entry-nilai-ujian','JadwalUjianController@entry_nilai_ujian');
Route::get('/operator/entry-nilai-ujian/get-data-peserta-ujian','JadwalUjianController@get_data_peserta_ujian');
Route::get('/operator/entry-nilai-ujian/load-data-peserta-ujian','JadwalUjianController@load_data_peserta_ujian');
Route::post('/operator/entry-nilai-ujian/update-nilai-peserta-ujian','JadwalUjianController@update_nilai_ujian');
Route::get('/count-total-peserta-ujian','JadwalUjianController@count_peserta_ujian');
Route::get('/count-total-peserta-lulus','JadwalUjianController@count_peserta_ujian_lulus');
Route::get('/count-total-peserta-tidak-lulus','JadwalUjianController@count_peserta_ujian_tidak_lulus');
Route::post('/operator/entry-nilai-ujian/confirmasi-kelulusan','JadwalUjianController@confirmasi_kelulusan');

Route::get('/operator/jadwal-ujian/notif/{id}','JadwalUjianController@notif')->name('notif.ujian');
Route::get('/operator/laporan-kelulusan-ujian','JadwalUjianController@laporan_kelulusan');

Route::get('/daftar_awal','PendaftaranOnlineController@daftar_awal');
Route::get('/get_prodi','PendaftaranOnlineController@get_prodi')->name('get.prodi');
Route::get('/get_strata','PendaftaranOnlineController@get_strata')->name('get.strata');
Route::get('/get_kelas','PendaftaranOnlineController@get_kelas')->name('get.kelas');
Route::get('/get_biaya','PendaftaranOnlineController@get_biaya')->name('get.biaya');

Route::get('/get_kota','CalonMhsController@get_kota')->name('get.kota');
Route::get('/get_kecamatan','CalonMhsController@get_kecamatan')->name('get.kecamatan');

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

//get data json from DB sistemik
Route::get('/calon-mahasiswa/get-data-agama','CalonMhsController@get_data_agama');
Route::get('/calon-mahasiswa/get-data-wilayah','CalonMhsController@get_data_wilayah');
Route::get('/calon-mahasiswa/get-data-alat-transportasi','CalonMhsController@get_data_alat_transportasi');

Route::get('/calon-mahasiswa/get-data-jenjang-pendidikan','CalonMhsController@get_data_jenjang_pendidikan');
Route::get('/calon-mahasiswa/get-data-pekerjaan','CalonMhsController@get_data_pekerjaan');
Route::get('/calon-mahasiswa/get-data-penghasilan','CalonMhsController@get_data_penghasilan');
Route::get('/calon-mahasiswa/get-data-jenis_tinggal','CalonMhsController@get_data_jenis_tinggal');

Route::get('/calon-mahasiswa/get-data-kewarganegaraan','CalonMhsController@get_data_kewarganegaraan');

Route::get('/agama_get','PendaftaranOnlineController@agama_get')->name('agama.get');
Route::get('/provinsi_get','PendaftaranOnlineController@provinsi_get')->name('provinsi.get');
Route::get('/kota_get','PendaftaranOnlineController@kota_get')->name('kota.get');
Route::get('/kecamatan_get','PendaftaranOnlineController@kecamatan_get')->name('kecamatan.get');
Route::get('/pendidikan_get','PendaftaranOnlineController@pendidikan_get')->name('pendidikan.get');
Route::get('/pekerjaan_get','PendaftaranOnlineController@pekerjaan_get')->name('pekerjaan.get');
Route::get('/penghasilan_get','PendaftaranOnlineController@penghasilan_get')->name('penghasilan.get');
Route::get('/warganegara_get','PendaftaranOnlineController@warganegara_get')->name('warganegara.get');
