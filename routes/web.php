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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('mahasiswa')->group(function () {
    Route::get('/', 'MahasiswaController@index')->name('mahasiswa.index');
    Route::get('/create', 'MahasiswaController@create')->name('mahasiswa.create');
    Route::get('/destroy/{id}', 'MahasiswaController@destroy')->name('mahasiswa.destroy');
    Route::get('/edit/{id}', 'MahasiswaController@edit')->name('mahasiswa.edit');
    Route::get('/show/{id}', 'MahasiswaController@show')->name('mahasiswa.show');
    Route::post('/update/{id}', 'MahasiswaController@update')->name('mahasiswa.update');
    Route::post('/store', 'MahasiswaController@store')->name('mahasiswa.store');
});

Route::prefix('dosen')->group(function () {
    Route::get('/', 'DosenController@index')->name('dosen.index');
    Route::get('/create', 'DosenController@create')->name('dosen.create');
    Route::get('/destroy/{id}', 'DosenController@destroy')->name('dosen.destroy');
    Route::get('/edit/{id}', 'DosenController@edit')->name('dosen.edit');
    Route::get('/show/{id}', 'DosenController@show')->name('dosen.show');
    Route::post('/update/{id}', 'DosenController@update')->name('dosen.update');
    Route::post('/store', 'DosenController@store')->name('dosen.store');
});

Route::prefix('ab')->group(function () {
    Route::get('/', 'ABController@index')->name('ab.index');
    Route::get('/create', 'ABController@create')->name('ab.create');
    Route::get('/destroy/{id}', 'ABController@destroy')->name('ab.destroy');
    Route::get('/edit/{id}', 'ABController@edit')->name('ab.edit');
    Route::get('/show/{id}', 'ABController@show')->name('ab.show');
    Route::post('/update/{id}', 'ABController@update')->name('ab.update');
    Route::post('/store', 'ABController@store')->name('ab.store');
});
