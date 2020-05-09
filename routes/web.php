<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/beranda', 'AdminController@index'); 

Route::get('/form', 'AdminController@formKegiatan');

Route::post('/tambahKegiatan','AdminController@inputKegiatan');

Route::get('/kegiatan', 'AdminController@show');

Route::get('/status/{id}', 'AdminController@status');

Route::get('/detail/{id}', 'AdminController@detail');

Route::get('/hapus/{id}','AdminController@delete');

Route::get('/daftar', 'WebController@daftarKegiatan');

Route::post('/prosesDaftar', 'WebController@prosesDaftar');
 
Auth::routes();

Route::get('/home', 'AdminController@index')->name('home');
