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
Route::get('home', function () {
	return view('pages.home');
});
Route::get('register', function () {
	return view('pages.register');
});
Route::get('admin', function () {
	return view('admin.trangchuadmin');
});
Route::get('admin/login','Admin\HomeController@getLoginAdmin');
Route::post('admin/login','Admin\HomeController@postLoginAdmin');
Route::post('admin/logout', 'Admin\HomeController@getLogout');
// Route::get('register', 'PagesController@getRegister');
// Route::post('register', 'PagesController@postRegister');
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
// 
// Auth::routes();
// Route::get('home','Admin\HomeController@index');
// Route::get('home','Admin\AdimController@index');

Route::group(['prefix' => 'admin'], function(){
	Route::group(['prefix' => 'trangchu'], function(){
		// Route::get('list', 'Admin\HomeController@getList');

	});
	Route::get('trangchu', 'Admin\HomeController@index');

	Route::group(['prefix' => 'admin'], function(){
		Route::get('list', 'Admin\AdminController@getList');
		Route::get('add', 'Admin\AdminController@getAdd');
		Route::post('add', 'Admin\AdminController@postAdd');
		Route::get('edit/{id}', 'Admin\AdminController@getEdit');
		Route::post('edit/{id}', 'Admin\AdminController@postEdit');

	});
	Route::group(['prefix' => 'province'], function(){
		Route::get('list', 'Admin\ProvinceController@getList');
		Route::get('add', 'Admin\ProvinceController@getAdd');
		Route::post('add', 'Admin\ProvinceController@postAdd');
		Route::get('edit/{id}', 'Admin\ProvinceController@getEdit');
		Route::post('edit/{id}', 'Admin\ProvinceController@postEdit');
		Route::get('delete/{id}', 'Admin\ProvinceController@getDelete');

	});
	Route::group(['prefix' => 'district'], function(){
		Route::get('list', 'Admin\DistrictController@getList');
		Route::get('add', 'Admin\DistrictController@getAdd');
		Route::post('add', 'Admin\DistrictController@postAdd');
		Route::get('edit/{id}', 'Admin\DistrictController@getEdit');
		Route::post('edit/{id}', 'Admin\DistrictController@postEdit');
		Route::get('delete/{id}', 'Admin\DistrictController@getDelete');

	});
	Route::group(['prefix' => 'service'], function(){
		Route::get('list', 'Admin\ServiceController@getList');
		Route::get('add', 'Admin\ServiceController@getAdd');
		Route::post('add', 'Admin\ServiceController@postAdd');
		Route::get('edit/{id}', 'Admin\ServiceController@getEdit');
		Route::post('edit/{id}', 'Admin\ServiceController@postEdit');
		Route::get('delete/{id}', 'Admin\ServiceController@getDelete');

	});
});
Route::group(['prefix' => 'unithotel'], function(){
	Route::group(['prefix' => 'info'], function(){
		Route::get('home', 'UnithotelController@getindex');
		Route::get('profile', 'UnithotelController@getProfile');
		Route::post('profile', 'UnithotelController@postProfile');

		Route::get('add', 'UnithotelController@getAddinfo');
		Route::get('edit', 'UnithotelController@getEditinfo');
	});
	Route::group(['prefix' => 'placeofthought'], function(){
		Route::get('add', 'UnithotelController@getPlaceofthought');
		Route::get('edit', 'UnithotelController@getPlaceofthought');
	});
	Route::group(['prefix' => 'room'], function(){
		Route::get('add', 'UnithotelController@getAddroom');
		Route::get('edit', 'UnithotelController@getAddinfo');
	});
});
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('unithotel/login', 'UnithotelController@getLogin');
Route::post('unithotel/login', 'UnithotelController@postLogin');
	// return view('unithotel.login_and_register_tabbed_form');
Route::get('unithotel/register', 'UnithotelController@getRegister');
Route::post('unithotel/register', 'UnithotelController@postRegister');
Route::post('unithotel/logout', 'UnithotelController@getLogout');
