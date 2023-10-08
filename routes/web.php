<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;


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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// User
Route:: resource('/user','userController' )->middleware('auth');
Route:: get('/user/hapus/{id}' , 'userController@destroy' );

//Buku
Route::resource('/buku','BukuController')->middleware('auth');
Route::get('/buku/search', 'BukuController@search')->name('buku.search');
Route::get('/buku/hapus/{kd_buku}','BukuController@destroy'); //Delete
Route::post('/upload-image', 'BukuController@upload')->name('upload.image');

//Katalog
Route::resource('/katalog','KatalogController')->middleware('auth');

 //Anggota
// Route::resource('/user','AnggotaController');
// Route::get('/user/hapus/{id}','AnggotaController@destroy');

//Peminjaman
Route::resource('/transaksi','TransaksiController')->middleware('auth');
Route::get('/transaksi/hapus/{id}','TransaksiController@destroy');

// Laporan
Route:: resource('/laporan','LaporanController')->middleware('auth');
Route::put('/laporan/cetak', 'LaporanController@show');
Route::post('/export/transaksi', 'LaporanController@exportExcel');
Route::post('/export/user', 'LaporanController@exportExcel');
Route::post('/export/buku', 'LaporanController@exportExcel');

Route::get('/logout', function(){
    return view('auth/login');
});

// Register
// Route::resource('register', 'Auth\RegisterController');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');

// Katalog
// Route::get('/katalog', 'KatalogController@index')->name('katalog.index');
// Route::post('/katalog/store', 'KatalogController@store')->name('katalog.store');








