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

	Route::get('/products', 'ProductController@index')->name('products.index');
	Route::get('/products/create', 'ProductController@create')->name('products.create');
	Route::post('/products/add', 'ProductController@Add')->name('products.add');
	Route::get('/products/edit{id}', 'ProductController@edit')->name('products.edit');
	Route::post('/products/update', 'ProductController@update')->name('products.update');
	Route::get('/products/delete{id}', 'ProductController@deleteProduct')->name('products.delete');

	Route::get('/variations', 'VariationController@index')->name('variations');
	Route::post('/variations', 'VariationController@store')->name('variations');
	Route::get('/variations/create', 'VariationController@create')->name('variations.create');
	Route::post('/getVariants', 'VariationController@getVariants')->name('getVariants');
		Route::get('/variations/edit{id}', 'VariationController@edit')->name('variations.edit');
	Route::post('/variations/update', 'VariationController@update')->name('variations.update');
	Route::get('/variations/delete{id}', 'VariationController@deleteProduct')->name('variations.delete');




	Route::get('/inventories', 'InventoryController@index')->name('inventories.index');
	Route::post('/inventories', 'InventoryController@store')->name('inventories');
	Route::get('/inventories/create', 'InventoryController@create')->name('inventories.create');
});

