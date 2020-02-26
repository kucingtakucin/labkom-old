<?php

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

Route::get('/', 'DashboardController@index')->name('Dashboard');
Route::get('/admin', function () {
    return view('welcome');
})->name('Welcome');
Route::group(['prefix' => 'PeminjamanLab'], function () {
    Route::get('/', function () {
        return view('PeminjamanLab.PeminjamanLab');
    })->name('PeminjamanLab');
    Route::resource('/DiDalam', 'PeminjamanLabDiDalamController');
    Route::resource('/DiLuar', 'PeminjamanLabDiLuarController');
});
Route::resource('/PeminjamanAlat', 'PeminjamanAlatController');
Route::resource('/PeminjamanStudio', 'PeminjamanStudioController');
Route::resource('/SuratBebasLabkom', 'SuratBebasLabkomController');
Route::resource('/JasaInstallasi', 'JasaInstallasiController');
Route::resource('/JasaPrint', 'JasaPrintController');
Route::resource('/Mahasiswa', 'MahasiswaController');
Route::resource('/Dosen', 'DosenController');
Route::resource('/MataKuliah', 'MataKuliahController');

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

