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

Route::get('/productlist', 'ProductController@index')->name('productlist'); 


Route::post('add_category', 'CategoryController@store')->name('add_category');

Route::get('single_delete','CategoryController@destroy')->name('single_delete');

Route::post('multiple_delete_category', 'CategoryController@destroy_all')->name('multiple_delete_category');

Route::get('edit_category', 'CategoryController@edit')->name('edit_category');

Route::post('update_category/{id}', 'CategoryController@update')->name('update_category');


Route::post('insert_product','ProductController@store')->name('insert_product');

Route::get('edit_product','ProductController@edit')->name('edit_product');

Route::post('update_product/{id}','ProductController@update')->name('update_product');

Route::get('createproduct','ProductController@category_list');

Route::get('single_delete_product','ProductController@destroy')->name('single_delete_product');

Route::post('multiple_delete_product','ProductController@destroy_all')->name('multiple_delete_product');