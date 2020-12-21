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

Route::get('/', 'HomeController@showList');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/top', function(){
    return view('top');
});
Route::get('products/search', 'ProductController@search');
Route::get('products/sort/{column}', 'ProductController@sort');
Route::post('products/conf/{id}', 'ProductController@conf');
Route::post('products/fix/{id}', 'ProductController@fix');
Route::resource('products', 'ProductController');
