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
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');

// ADMIN \\
Route::get('/admin', 'admin@login');
Route::get('/tampiladmin', 'admin@tampiladmin')->middleware('jwt_ok');
Route::post('/admin', 'admin@register');
Route::put('/admin/{id}', 'admin@update');
Route::delete('/admin/{id}', 'admin@delete');

// penyewa \\
Route::get('/penyewa', 'penyewa@tampil')->middleware('jwt.verify');
Route::put('/penyewa/{id}', 'penyewa@update')->middleware('jwt.verify');
Route::delete('/penyewa/{id}', 'penyewa@delete')->middleware('jwt.verify');
Route::post('/penyewa', 'penyewa@store')->middleware('jwt.verify');

// transaksi \\
Route::post('/tampil_transaksi', 'transaksi@tampil_transaksi')->middleware('jwt.verify');
Route::put('/transaksi/{id}', 'transaksi@update')->middleware('jwt.verify');
Route::delete('/transaksi/{id}', 'transaksi@delete')->middleware('jwt.verify');
Route::post('/transaksi', 'transaksi@store')->middleware('jwt.verify');

// jenis_mobil \\
Route::get('jenis_mobil/{id}','jenis_mobil@tampil_pinjam')->middleware('jwt.verify');
Route::put('/jenis_mobil/{id}', 'jenis_mobil@update')->middleware('jwt.verify');
Route::delete('/jenis_mobil/{id}', 'jenis_mobil@delete')->middleware('jwt.verify');
Route::post('/jenis_mobil', 'jenis_mobil@store')->middleware('jwt.verify');

// mobil \\
Route::get('/mobil','mobil@tampil_pinjam')->middleware('jwt.verify');
Route::put('/mobil/{id}', 'mobil@update')->middleware('jwt.verify');
Route::delete('/mobil/{id}', 'mobil@delete')->middleware('jwt.verify');
Route::post('/mobil', 'mobil@store')->middleware('jwt.verify');

// detail transaksi \\
//Route::get('detail_transaksi','detail_transaksi@tampil_pinjam')->middleware('jwt.verify');
//Route::put('/detail_transaksi/{id}', 'detail_transaksi@update')->middleware('jwt.verify');
//Route::delete('/detail_transaksi/{id}', 'detail_transaksi@delete')->middleware('jwt.verify');
//Route::post('/detail_transaksi', 'detail_transaksi@store')->middleware('jwt.verify');