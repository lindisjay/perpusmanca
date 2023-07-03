<?php

use App\Http\Controllers\Auth\RegisterController;
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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// User
Route:: resource('/user','userController' );
Route:: get('/user/hapus/{id}' , 'userController@destroy' );

//Buku
Route::resource('/buku','BukuController'); //Create + Read
Route::get('/buku/hapus/{kd_buku}','BukuController@destroy'); //Delete

 //Anggota
Route::resource('/anggota','AnggotaController');
Route::get('/anggota/hapus/{id}','AnggotaController@destroy');

//Peminjaman
Route::resource('/transaksi','TransaksiController');
Route::get('/transaksi/hapus/{id}','TransaksiController@destroy');

// Laporan
Route:: resource('/laporan','LaporanController');

// Register
Route::get('/register', 'Auth\RegisterController@index')->name('register.index');



