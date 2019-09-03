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

# Route::get('/', function () {
#     return view('pages.list_category');
# });

Route::get('/', 'CategoryController@index');
Route::get('/createcategory', function () {
	return view('pages.create_category');
	});



Route::post('add_category', 'CategoryController@store')->name('add_category');

Route::get('single_delete','CategoryController@destroy')->name('single_delete');

Route::post('multiple_delete_category', 'CategoryController@destroy_all')->name('multiple_delete_category');