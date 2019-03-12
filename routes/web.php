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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/products', 'ProductsController@index')->name('products.index');

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@home')->name('home');

    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::get('/users/{user}', 'UsersController@show')->name('users.show');
    Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
    Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
    Route::post('/users/{user}', 'UsersController@update')->name('users.update');

    Route::get('/orders', 'OrdersController@index')->name('orders.index');
    Route::get('/orders/create', 'OrdersController@create')->name('orders.create');
    Route::post('/orders_product', 'OrdersController@storeOrderProduct')->name('orders.storeOrderProduct');
    Route::post('/orders', 'OrdersController@store')->name('orders.store');
    Route::get('/orders/{order}', 'OrdersController@show')->name('orders.show');
    Route::get('/orders/{order}/edit', 'OrdersController@edit')->name('orders.edit');
    Route::post('orders/{order}', 'OrdersController@update')->name('orders.update');
    Route::delete('orders/{order}', 'OrdersController@destroy')->name('orders.destroy');

    
    Route::get('products/create', 'ProductsController@create')->name('products.create');
    Route::post('/products', 'ProductsController@store')->name('products.store');
    Route::get('products/{product}', 'ProductsController@show')->name('products.show');
    Route::get('products/{product}/edit', 'ProductsController@edit')->name('products.edit');
    Route::post('products/{product}', 'ProductsController@update')->name('products.update');
    Route::delete('products/{product}', 'ProductsController@destroy')->name('products.destroy');
});

Route::get('/search', function (Request $request) {
    dd ($request->search);
    return App\Order::search($request->search)->get();
});
