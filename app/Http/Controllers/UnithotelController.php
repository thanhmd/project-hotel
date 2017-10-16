<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnithotelController extends Controller
{
    public function getAddinfo() {
    	return view("hotel.info.add");
    }
    public function getAddroom() {
    	return view("hotel.room.add");
    }
    public function getPlaceofthought() {
    	return view("hotel.placeofthought.add");
    }
}
