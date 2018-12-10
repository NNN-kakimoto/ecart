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

Route::get('/', function () {
		Session::getId();
    return view('index');
});

Route::get('/product/{id?}','ProductsController@show');
//Route::post('/post_cart', 'ProductsController@store');

Route::get('/order/cart', 'OrdersController@cart');
Route::post('/order/add', 'OrdersController@add');
//Route::get('/order/add', 'OrdersController@add');
Route::post('/order/remove', 'OrdersController@remove');
Route::post('/order/commit', 'OrdersController@commit');
Route::get('/order/finish', 'OrdersController@finish');
Route::post('/order/delete_all', 'OrdersController@delete_all');