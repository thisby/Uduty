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
Auth::routes();



Route::get('/', 'DefaultController@index');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('duty/list/{country}', 'DutyController@list');

Route::get('duty/create', [
    'uses' => 'DutyController@create',
    'as' => 'duty.create'
]);

Route::post('duty/store', [
    'uses' => 'DutyController@store',
    'as' => 'duty.store'
]);



Route::resource('cart', 'CartController', ['only' => ['index', 'store', 'update', 'destroy']]);

Route::post('cart/qty','CartController@update')->name('qty');



Route::get('shop/index',['as' => 'shop/index', 'uses' => 'ShopController@index']);

