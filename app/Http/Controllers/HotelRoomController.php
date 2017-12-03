<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Typeroom;
use App\DetailHotelTyperoom;

class HotelRoomController extends Controller
{
    public function getList($idhotel) {
        $hotel = Hotel::find($idhotel);
        $detail_typerooms = $hotel->typeroom_detail()->get();
        return view("unithotel.hotel.room.list", ['hotel' => $hotel, 'detail_typerooms' => $detail_typerooms]);
    }

    public function getDelete($idhotel, $idroom) {
        $hotel_room = DetailHotelTyperoom::find($idroom);
        $hotel_room -> delete();
        return redirect('unithotel/hotel/' .  $idhotel . '/detail/room/list')->with('thongbao', 'xóa thành công');
    }

    public function getAdd($idhotel)
    {
        $hotel = Hotel::find($idhotel);
        $typerooms = Typeroom::all();
        return view('unithotel.hotel.room.add', ['hotel' => $hotel, 'typerooms' => $typerooms]);
    }

    public function postAdd(Request $req, $idhotel)
    {
        $this->validate($req,
            [
                "typeroom"             => "required",
                "name"             => "required",
                "price"            => "required",
                "capacity"         => "required",
            ],
            [
                "room.required"        => "Bạn chưa chọn loại phòng ",
                "name.required"            => "Bạn chưa nhập tên phòng ",
                "price.required"            => "Bạn chưa nhập giá phòng",
                "capacity.required"            => "Bạn chưa nhập sức chứa",
            ]);
        $hotel_room              = new DetailHotelTyperoom;
        $hotel_room->name        = $req->name;
        $hotel_room->typeroom_id = $req->typeroom;
        $hotel_room->price       = $req->price;
        $hotel_room->status      = $req->status;
        $hotel_room->hotel_id      = $idhotel;
        $hotel_room->maxpeople      = $req->capacity;
        $hotel_room->save();
        return redirect('unithotel/hotel/' .  $idhotel . '/detail/room/list')->with("thongbao", "Thêm thành công ! ");
    }

    public function getEdit($idhotel, $idroom)
    {
        $hotel_room = DetailHotelTyperoom::find($idroom);
        $typerooms = Typeroom::all();
        return view('unithotel.hotel.room.edit', ['hotel_room' => $hotel_room, 'typerooms' => $typerooms]);
    }

    public function postEdit(Request $req, $idhotel, $idroom)
    {
        $this->validate($req, [
                'name'  => 'required',
                'typeroom'=> 'required',
                'price'=>'required',
                "capacity"         => "required",
            ],
            [
                'name.required' => 'Bạn chưa nhập tên phòng',
                'typeroom.required' => 'Bạn chưa chọn loại phòng',
                'price.required'=> "Bạn chưa nhập giá phòng",
                'capacity.required'=> "Bạn chưa nhập sức chứa",
            ]);
        $hotel_room = DetailHotelTyperoom::find($idroom);
        $hotel_room->name = $req->name;
        $hotel_room->typeroom_id   = $req->typeroom;
        $hotel_room->price  = $req->price;
        $hotel_room->status =$req->status;
        $hotel_room->maxpeople =$req->capacity;
        $hotel_room->save();
        return redirect('unithotel/hotel/' .  $hotel_room->hotel_id . '/detail/room/list')->with('thongbao', 'Sửa thành công');
    }
}
