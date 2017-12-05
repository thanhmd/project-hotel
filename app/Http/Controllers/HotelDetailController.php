<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Province;
use App\Hotel;

class HotelDetailController extends Controller
{
    public function getDetail($id){
    	  $hotel = Hotel::find($id);
        return view("unithotel.hotel.detail.detail", ['hotel' => $hotel]);
    }
}
