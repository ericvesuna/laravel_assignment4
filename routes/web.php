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
 return view('pages.select');
});

Route::get('/categorylist', 'CategoryController@index')->name('categorylist');

Route::get('/createcategory', function () {
	return view('pages.create_category');
	});

Route::get('/productlist', function () {
	return view('pages.list_product');
	});


Route::post('add_category', 'CategoryController@store')->name('add_category');

Route::get('single_delete','CategoryController@destroy')->name('single_delete');

Route::post('multiple_delete_category', 'CategoryController@destroy_all')->name('multiple_delete_category');

Route::get('edit_category', 'CategoryController@edit')->name('edit_category');

Route::post('update_category/{id}', 'CategoryController@update')->name('update_category');


Route::get('createproduct', function () {
	return view('pages.create_product');
	});