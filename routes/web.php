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


Route::get('mentor/{id}/img', 'GeneralController@image');

Route::get('page/{path}', 'GeneralController@index')->where('path', '(.*)');

Route::get('/', 'GeneralController@index')->name('home');

//
//Route::resource('mentor', 'GeneralController');
//
