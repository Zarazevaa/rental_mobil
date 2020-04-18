<?php

use Illuminate\Http\Request;

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
Route::post('register', 'petugas_controller@register');
Route::post('login', 'petugas_controller@login');

Route::post('/simpan_pelanggan','pelanggan_controller@store')->middleware('jwt.verify');
Route::put('/ubah_pelanggan/{id_pelanggan}','pelanggan_controller@update')->middleware('jwt.verify');
Route::delete('/hapus_pelanggan/{id_pelanggan}','pelanggan_controller@destroy')->middleware('jwt.verify');
Route::get('/tampil_pelanggan','pelanggan_controller@tampil_pelanggan')->middleware('jwt.verify');

Route::post('/simpan_mobil','mobilcontroller@store')->middleware('jwt.verify');
Route::put('/ubah_mobil/{id_mobil}','mobilcontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_mobil/{id_mobil}','mobilcontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_mobil','mobilcontroller@tampil_mobil')->middleware('jwt.verify');

Route::post('/simpan_jenis','jenis_mobilcontroller@store')->middleware('jwt.verify');
Route::put('/ubah_jenis/{id_jm}','jenis_mobilcontroller@update')->middleware('jwt.verify');
Route::delete('/hapus_jenis/{id_jm}','jenis_mobilcontroller@destroy')->middleware('jwt.verify');
Route::get('/tampil_jenis','jenis_mobilcontroller@tampil_jm')->middleware('jwt.verify');
