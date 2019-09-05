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


Route::get('/','FrontController@index')->name('utama');
Route::get('/artikel/{arti}','FrontController@show')->name('artikel.detail');
Route::get('/artikel-kategori/{kate}','FrontController@kategori')->name('artikel.kategori');
Route::get('/about', 'FrontController@about')->name('about');
Route::get('/contact', 'FrontController@contact')->name('contact');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['auth','Role:Super Admin,Admin']],function(){
Route::resource('/kategori','KategoriController');
Route::resource('/artikel','ArtikelController');
});

Route::group(['middleware'=>['auth','Role:Super Admin']],function(){
Route::resource('/user','UserController');
});