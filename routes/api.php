<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/fakultas/edit/{id_fakultas}','ApiController@editnamafakultas')->name('fakultas.edit');
Route::post('/fakultas/id/{id_fakultas}','ApiController@editidfakultas')->name('fakultas.id');
Route::post('/prodi/nama/edit/{id_prodi}','ApiController@editnamaprodi')->name('prodi.nama');
Route::post('/prodi/id/edit/{id_prodi}','ApiController@editidprodi')->name('prodi.id');
Route::post('/strata/id/edit/{id_strata}','ApiController@editidstrata')->name('strata.id');
Route::post('/strata/jenis/edit/{id_strata}','ApiController@editjenisstrata')->name('strata.jenis');
Route::post('/kelas/id/edit/{id_kelas}','ApiController@editidkelas')->name('kelas.id');
Route::post('/kelas/jenis/edit/{id_kelas}','ApiController@editjeniskelas')->name('kelas.jenis');
