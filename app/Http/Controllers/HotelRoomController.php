<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Room;
use App\DetailHotelRoom;

class HotelRoomController extends Controller
{
    public function getList($idhotel) {
        $hotel = Hotel::find($idhotel);
        $rooms = $hotel->room_detail()->get();
        return view("unithotel.hotel.room.list", ['hotel' => $hotel, 'rooms' => $rooms]);
    }
    
    public function getDelete($idhotel, $idroom) {
        $hotel_room = DetailHotelRoom::find($idroom);
        $hotel_room -> delete();
        return redirect('unithotel/hotel/' .  $idhotel . '/room/list')->with('thongbao', 'xóa thành công');
    }

    public function getAdd($idhotel)
    {
        $hotel = Hotel::find($idhotel);
        $rooms = Room::all();
        return view('unithotel.hotel.room.add', ['hotel' => $hotel, 'rooms' => $rooms]);
    }

    public function postAdd(Request $req, $idhotel)
    {
        $this->validate($req,
            [
                "room"             => "required",
                "name"             => "required",
                "price"            => "required"
            ],
            [
                "room.required"        => "Bạn chưa chọn loại phòng ",
                "name.required"            => "Bạn chưa nhập tên phòng ",
                "price.required"            => "Bạn chưa nhập giá phòng"
            ]);
        $hotel_room              = new DetailHotelRoom;
        $hotel_room->name        = $req->name;
        $hotel_room->room_id = $req->room;
        $hotel_room->price       = $req->price;
        $hotel_room->status      = $req->status;
        $hotel_room->hotel_id      = $idhotel;
        $hotel_room->save();
        return redirect('unithotel/hotel/' .  $idhotel . '/room/list')->with("thongbao", "Thêm thành công ! ");
    }

    public function getEdit($idhotel, $idroom)
    {
        $hotel_room = DetailHotelRoom::find($idroom);
        $rooms = Room::all();
        return view('unithotel.hotel.room.edit', ['hotel_room' => $hotel_room, 'rooms' => $rooms]);
    }

    public function postEdit(Request $req, $idhotel, $idroom)
    {
        $this->validate($req, [
                'name'  => 'required',
                'room'=> 'required',
                'price'=>'required',
            ],
            [
                'name.required' => 'Bạn chưa nhập tên phòng',
                'room.required' => 'Bạn chưa chọn loại phòng',
                'price.required'=> "Bạn chưa nhập giá phòng"
            ]);
        $hotel_room = DetailHotelRoom::find($idroom);
        $hotel_room->name = $req->name;
        $hotel_room->room_id   = $req->room;
        $hotel_room->price  = $req->price;
        $hotel_room->status =$req->status;
        $hotel_room->save();
        return redirect('unithotel/hotel/' .  $hotel_room->hotel_id . '/room/list')->with('thongbao', 'Sửa thành công');
    }
}