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
	return redirect()->route('inventories');
    return view('admin.index');
    return view('welcome');
});


Auth::routes();

Route::middleware('auth')->group(function () {   
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/products', 'ProductController@index')->name('products');
	Route::post('/products', 'ProductController@store')->name('products');
	Route::get('/products/create', 'ProductController@create')->name('products.create');

	Route::get('/variations', 'VariationController@index')->name('variations');
	Route::post('/variations', 'VariationController@store')->name('variations');
	Route::get('/variations/create', 'VariationController@create')->name('variations.create');
	Route::post('/getVariants', 'VariationController@getVariants')->name('getVariants');

	Route::get('/inventories', 'InventoryController@index')->name('inventories');
	Route::post('/inventories', 'InventoryController@store')->name('inventories');
	Route::get('/inventories/create', 'InventoryController@create')->name('inventories.create');
});

