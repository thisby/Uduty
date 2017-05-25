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

/* AUTHENTICATION */
	Auth::routes();
/******************/

/* HOME */
	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index')->name('home');
/********/	

/* DUTIES */
	Route::get('duty/list/{country}', 'DutyController@list');

	Route::get('duty/create', [
	    'uses' => 'DutyController@create',
	    'as' => 'duty.create'
	]);

	Route::post('duty/store', [
	    'uses' => 'DutyController@store',
	    'as' => 'duty.store'
	]);

/**********/

/* USER */
	Route::get('user/duties','UserController@getDuties');
	Route::get('user/trips','UserController@getTrips');
	Route::resource('user','UserController');
/********/

/* CART */
	Route::resource('cart', 'CartController', ['only' => ['index', 'store', 'update', 'destroy']]);
	Route::post('cart/qty','CartController@update')->name('qty');
/********/


/* SHOP */
	Route::get('shop/index',['as' => 'shop/index', 'uses' => 'ShopController@index']);
	Route::post('shop/store',['as' => 'shop.store', 'uses' => 'ShopController@store']);
/********/

