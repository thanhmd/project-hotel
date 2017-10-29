<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;
use App\Typeroom;
class RoomController extends Controller
{
	public function getList() {
		$room = Room::all();
    	$type_room = Typeroom::all();
    	return view("admin.room.list", ["room" => $room , "type_room" => $type_room]);
	}
	
}
