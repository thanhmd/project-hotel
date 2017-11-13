<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Province;
use App\Hotel;
use App\Listimageshotel;
use App\Typeroom;
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
    	$province 			= Province::findOrFail($province_id);
    	$hotelByProvince 	= Hotel::where('province_id', $province_id)->get();
    	// print_r($province['name']); exit();
    	//dd($province->name); exit();
    	return view("pages.list-province", compact('hotelByProvince', 'province' ));
    }
    public function getDetailhotel($id) {
        $hotel      = Hotel::findOrFail($id);
        $imageslist = Listimageshotel::where('hotel_id', $id)->get();
        $typeroom   = Typeroom::where('hotel_id', $id)->get();
        // var_dump($imageslist); exit();
        return view("pages.detailhotel", compact('hotel','imageslist','typeroom'));
    }
    // public function getTyperoomByhotel($id){

    // }
    public function getBookingroom() {
        return view("pages.booking-hotel") ;
    }
}
