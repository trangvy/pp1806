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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::get('/users/{user}', 'UsersController@show')->name('users.show');
    Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
    Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
    Route::post('/users/{user}', 'UsersController@update')->name('users.update');

    Route::post('/orders', 'OrdersController@store')->name('orders.store');
    Route::get('/orders/create', 'OrdersController@create')->name('orders.create');
});

Route::get('/products', 'ProductsController@index')->name('products.index');
Route::get('products/create', 'ProductsController@create')->name('products.create');
Route::post('/products', 'ProductsController@store')->name('products.store');
Route::get('products/{product}', 'ProductsController@show')->name('products.show');
Route::get('products/{product}/edit', 'ProductsController@edit')->name('products.edit');
Route::post('products/{product}', 'ProductsController@update')->name('products.update');
Route::delete('products/{product}', 'ProductsController@destroy')->name('products.destroy');
