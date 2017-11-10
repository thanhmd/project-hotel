<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Province;
use App\Hotel;
class PagesController extends Controller
{
    public function getRegister() {
    	return view("pages.register");
    }
    public function getHome(){
    	$province = Province::all();
        return view("pages.home", ["province" => $province]);	
    }
    public function getListhotelByprovince($province_id) {
    	// lấy tất cả các khách sạn theo tỉnh, province_id: cột trong database, $province_id : tham số truyền vào
    	$hotelByProvince = Hotel::where('province_id', $province_id)->get();
    	return view("pages.list-province", compact('hotelByProvince'));
    }
}
