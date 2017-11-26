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

Route::get('register', function () {
	return view('pages.register');
});
Route::get('admin', function () {
	return view('admin.trangchuadmin');
});

Route::get('admin/login','Admin\HomeController@getLoginAdmin');
Route::post('admin/login','Admin\HomeController@postLoginAdmin');
Route::post('admin/logout', 'Admin\HomeController@getLogout');


Route::group(['prefix' 	   => 'admin'], function(){
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
		Route::get('{id}/districts', 'Admin\ProvinceController@getDistricts');
	});
	Route::group(['prefix' => 'district'], function(){
		Route::get('list', 'Admin\DistrictController@getList');
		Route::get('add', 'Admin\DistrictController@getAdd');
		Route::post('add', 'Admin\DistrictController@postAdd');
		Route::get('edit/{id}', 'Admin\DistrictController@getEdit');
		Route::post('edit/{id}', 'Admin\DistrictController@postEdit');
		Route::get('delete/{id}', 'Admin\DistrictController@getDelete');

	});
	Route::group(['prefix' => 'typeservice'], function(){
		Route::get('list', 'Admin\TypeserviceController@getList');
		Route::get('add', 'Admin\TypeserviceController@getAdd');
		Route::post('add', 'Admin\TypeserviceController@postAdd');
		Route::get('edit/{id}', 'Admin\TypeserviceController@getEdit');
		Route::post('edit/{id}', 'Admin\TypeserviceController@postEdit');
		Route::get('delete/{id}', 'Admin\TypeserviceController@getDelete');
		
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
	Route::group(['prefix' => 'hotel_contract'], function(){
		
		Route::get('list', 'Admin\HotelController@getList');
		Route::get('list-not-ckect', 'Admin\HotelController@getListnotcheck');
		Route::get('checkshowhotel/{id}', 'Admin\HotelController@getCheckhotel');
		Route::post('checkshowhotel/{id}', 'Admin\HotelController@postCheckhotel');


		Route::get('add', 'Admin\HotelController@getAdd');
		Route::post('add', 'Admin\HotelController@postAdd');
		Route::get('edit/{id}', 'Admin\HotelController@getEdit');
		Route::post('edit/{id}', 'Admin\HotelController@postEdit');
		Route::get('delete/{id}', 'Admin\HotelController@getDelete');
	});
	Route::group(['prefix' => 'contract'], function(){
		
		Route::get('list', 'Admin\ContractController@getList');
		Route::get('list-not-ckect', 'Admin\ContractController@getListnotcheck');
		Route::get('checkshowhotel/{id}', 'Admin\ContractController@getCheckhotel');
		Route::post('checkshowhotel/{id}', 'Admin\ContractController@postCheckhotel');

		Route::get('add', 'Admin\ContractController@getAdd');
		Route::post('add', 'Admin\ContractController@postAdd');
		Route::get('edit/{id}', 'Admin\ContractController@getEdit');
		Route::post('edit/{id}', 'Admin\ContractController@postEdit');
		Route::get('delete/{id}', 'Admin\ContractController@getDelete');
		
	});
});
Route::group(['prefix' => 'unithotel'], function(){

	Route::group(['prefix' => 'info'], function(){
		Route::get('home', 'UnithotelController@getindex');
		Route::get('profile', 'UnithotelController@getProfile');
		Route::get('edit-profile', 'UnithotelController@getEditProfile');
		Route::post('edit-profile', 'UnithotelController@postEditProfile');
		Route::get('changepassword', 'UnithotelController@getChangepassword');
		Route::post('changepassword', 'UnithotelController@postChangepassword');
		Route::get('deleteAccount', 'UnithotelController@getDeleteAccount');
		// Route::get('add', 'UnithotelController@getAddinfo');
		// Route::get('edit', 'UnithotelController@getEditinfo');
		// Route::post('edit/{id}', 'Admin\RoomController@postEdit');
		//Route::get('delete'        ,   'UnithotelController@getDeleteAcount');
	});
	Route::group(['prefix' => 'hotel'], function(){
		Route::get('list', 'UnithotelController@getListhotel');
		Route::get('add', 'UnithotelController@getAddhotel');
		Route::post('add', 'UnithotelController@postAddhotel');
		Route::get('edit/{id}', 'UnithotelController@getEdithotel');
		Route::post('edit/{id}', 'UnithotelController@postEdithotel');
		Route::get('delete/{id}', 'UnithotelController@getDeleteHotel');
		Route::group(['prefix' => '{idhotel}/room'], function(){
			Route::get('list', 'HotelRoomController@getList');
			Route::get('add', 'HotelRoomController@getAdd');
			Route::post('add', 'HotelRoomController@postAdd');
			Route::get('edit/{idroom}', 'HotelRoomController@getEdit');
			Route::post('edit/{idroom}', 'HotelRoomController@postEdit');
			Route::get('delete/{idroom}', 'HotelRoomController@getDelete');
	});
		Route::group(['prefix' => '{idhotel}/service'], function(){
			Route::get('list', 'HotelServiceController@getList');
			Route::get('add', 'HotelServiceController@getAdd');
			Route::post('add', 'HotelServiceController@postAdd');
			Route::get('edit/{idroom}', 'HotelServiceController@getEdit');
			Route::post('edit/{idroom}', 'HotelServiceController@postEdit');
			Route::get('delete/{idroom}', 'HotelServiceController@getDelete');
	});
	});
	Route::group(['prefix' => 'ajax'], function(){
		Route::get('district/{province_id}', 'AjaxController@getDistrict');

	});
});
Route::group(['prefix' => '/'], function(){
	Route::get('', 'PagesController@getHome');
	Route::get('listhotel/{province_id}', 'PagesController@getListhotelByprovince');
	Route::get('detailhotel/{id}',        'PagesController@getDetailhotel');
	Route::get('booking-room',            'PagesController@getBookingroom');
	Route::post('booking-room',           'PagesController@postBookingroom');
	Route::post('mail/xuli', 'PagesController@xuli');
	
});

Route::get('unithotel/login', 'UnithotelController@getLogin');
Route::post('unithotel/login', 'UnithotelController@postLogin');
Route::get('unithotel/register', 'UnithotelController@getRegister');
Route::post('unithotel/register', 'UnithotelController@postRegister');
Route::post('unithotel/logout', 'UnithotelController@getLogout');