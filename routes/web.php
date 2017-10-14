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
Route::get('admin/login','AdminController@getLoginAdmin');
Route::post('admin/login','AdminController@postLoginAdmin');

// Route::group(['prefix' => 'admin'], function(){
// 	Route::group(['prefix' => 'admin'], function(){
// 		Route::get('list', 'AdminController@getList');

// 		Route::get('add', 'AdminController@getAdd');
// 		Route::post('add', 'AdminController@postAdd');
// 		Route::get('edit', 'AdminController@getEdit');

// 		Route::get('edit', 'AdminController@getAdd');

// 	});
// });
// 
Route::group(['prefix' => 'admin'], function(){
	Route::group(['prefix' => 'admin'], function(){
		Route::get('list', 'Admin\AdminController@getList');
		Route::get('add', 'Admin\AdminController@getAdd');
		Route::post('add', 'Admin\AdminController@postAdd');
		Route::get('edit', 'Admin\AdminController@getEdit');
		Route::get('edit', 'Admin\AdminController@getAdd');

	});
	Route::group(['prefix' => 'province'], function(){
		Route::get('list', 'Admin\ProvinceController@getList');
		Route::get('add', 'Admin\ProvinceController@getAdd');
		Route::post('add', 'Admin\ProvinceController@postAdd');
		Route::get('edit', 'Admin\ProvinceController@getEdit');
		Route::get('edit', 'Admin\ProvinceController@getAdd');

	});
	Route::group(['prefix' => 'service'], function(){
		Route::get('list', 'Admin\ServiceController@getList');
		Route::get('add', 'Admin\ServiceController@getAdd');
		Route::post('add', 'Admin\ServiceController@postAdd');
		Route::get('edit', 'Admin\ServiceController@getEdit');
		Route::get('edit', 'Admin\ServiceController@getAdd');

	});
});