<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hotel;
use App\Listimageshotel;
use App\DetailHotelService;
use App\DetailHotelTyperoom;
use App\Contract;
//use Illuminate\Support\Facades\Auth; // thư viện login
class HotelController extends Controller
{
    public function getList() {
    		$hotel        = Hotel::all();
    		//$hotelimgs = Listimageshotel::all();
    		//$list_hotel_image = Listimageshotel::where('hotel_id', $hotel->id)->get();
            $service      = DetailHotelService::all();
            $contract     = Contract::all();
            $typeroom     = DetailHotelTyperoom::all();

    		return view("admin.hotel_contract.list", compact('hotel', 'hotelimgs','service', 'typeroom', 'contract'));
    }
    public function getListnotcheck() {
            $hotel         = Hotel::all();
            $hotel1        = Hotel::where('status', 0)->count();
            //$hotelimgs = Listimageshotel::all();
            //dd($hotel1); 
            //$list_hotel_image = Listimageshotel::where('hotel_id', $hotel->id)->get();
            $service      = DetailHotelService::all();
            $typeroom     = DetailHotelTyperoom::all();
            return view("admin.hotel_contract.list-hotel-check-yet", compact('hotel', 'hotelimgs','service', 'typeroom', 'hotel1'));
    }
    public function getCheckhotel($id){
    	$hotel = Hotel::find($id);
    	return view("admin.hotel_contract.check_hotel", compact('hotel'));
    }
    public function postCheckhotel(Request $req,$id){
    	$hotel = Hotel::find($id);
    	$this->validate($req,
            [
                'canRes'                 =>'required',
            ],
            [
                "canRes.required"        => "Bạn chưa check ",
            ]);
    	$hotel->status =1;
    	$hotel->save();
    	return redirect('admin/hotel_contract/list')->with('thongbao', 'khách sạn đã duyệt, quay lại trang chủ để kiểm tra');
    }
}
