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

Route::get('admin/login','Admin\AdminController@getLoginAdmin');
Route::post('admin/login','Admin\AdminController@postLoginAdmin');
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
	Route::group(['prefix' => 'district'], function(){
		Route::get('list', 'Admin\DistrictController@getList');
		Route::get('add', 'Admin\DistrictController@getAdd');
		Route::post('add', 'Admin\DistrictController@postAdd');
		Route::get('edit', 'Admin\DistrictController@getEdit');
		Route::get('edit', 'Admin\DistrictController@getAdd');

	});
	Route::group(['prefix' => 'service'], function(){
		Route::get('list', 'Admin\ServiceController@getList');
		Route::get('add', 'Admin\ServiceController@getAdd');
		Route::post('add', 'Admin\ServiceController@postAdd');
		Route::get('edit', 'Admin\ServiceController@getEdit');
		Route::get('edit', 'Admin\ServiceController@getAdd');

	});
});
Route::group(['prefix' => 'hotel'], function(){
	Route::group(['prefix' => 'info'], function(){
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