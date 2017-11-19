<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hotel;
use App\Contract;
use App\Listimageshotel;
//use Illuminate\Support\Facades\Auth; // thư viện login
class HotelController extends Controller
{
    public function getList() {
    		$hotel        = Hotel::all();
    		//$hotelimgs = Listimageshotel::all();
    		//dd($hotelimg); exit();
    		//$list_hotel_image = Listimageshotel::where('hotel_id', $hotel->id)->get();
    		return view("admin.hotel_contract.list", compact('hotel', 'hotelimgs'));
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
