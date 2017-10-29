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
// Route::group(['middleware' => ['web']], function () {
//     Route::get('login', 'UserLoginController@getUserLogin');
//     Route::post('login', ['as'=>'user.auth','uses'=>'UserLoginController@userAuth']);
//     Route::get('admin/login', 'AdminLoginController@getAdminLogin');
//     Route::post('admin/login', ['as'=>'admin.auth','uses'=>'AdminLoginController@adminAuth']);
//     Route::group(['middleware' => ['admin']], function () {
//         Route::get('admin/dashboard', ['as'=>'admin.dashboard','uses'=>'AdminController@dashboard']);
//     });
// });

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
		Route::get('delete/{id}', 'Admin\AdminController@getDelete');
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
	Route::group(['prefix' => 'customer'], function(){
		Route::get('list', 'Admin\CustomerController@getList');
		Route::get('add', 'Admin\CustomerController@getAdd');
		Route::post('add', 'Admin\CustomerController@postAdd');
		Route::get('edit/{id}', 'Admin\CustomerController@getEdit');
		Route::post('edit/{id}', 'Admin\CustomerController@postEdit');
		Route::get('delete/{id}', 'Admin\CustomerController@getDelete');

	});
	Route::group(['prefix' => 'typeroom'], function(){
		Route::get('list', 'Admin\TyperoomController@getList');
		Route::get('add', 'Admin\TyperoomController@getAdd');
		Route::post('add', 'Admin\TyperoomController@postAdd');
		Route::get('edit/{id}', 'Admin\TyperoomController@getEdit');
		Route::post('edit/{id}', 'Admin\TyperoomController@postEdit');
		Route::get('delete/{id}', 'Admin\TyperoomController@getDelete');

	});
	Route::group(['prefix' => 'room'], function(){
		Route::get('list', 'Admin\RoomController@getList');
		Route::get('add', 'Admin\RoomController@getAdd');
		Route::post('add', 'Admin\RoomController@postAdd');
		Route::get('edit/{id}', 'Admin\RoomController@getEdit');
		Route::post('edit/{id}', 'Admin\RoomController@postEdit');
		Route::get('delete/{id}', 'Admin\RoomController@getDelete');

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
