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

Route::get('/', 'DefaultController@index');

Route::get('duty/list/{country}', 'DutyController@list');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('shop', 'CartController', ['only' => ['index', 'store', 'update', 'destroy']]);

Route::get('basket',['as' => 'basket', 'uses' => 'CartController@index']);
