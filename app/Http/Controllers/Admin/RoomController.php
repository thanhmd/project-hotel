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
	
	public function getDelete($id) {
    	$room = Room::find($id);
    	$room -> delete();
    	return redirect('admin/room/list')->with('thongbao', 'xóa thành công');
    }

    public function getAdd()
    {
    	$type_room = Typeroom::all();
    	return view('admin.room.add', ['typeroom' => $type_room]);
    }

    public function postAdd(Request $req)
    {
    	$this->validate($req,
            [
                "typeroom"             => "required",
                "name"             => "required|unique:type_room,name",
                // chút nữa nhớ bắt lỗi mấy truong còn lại vô
                "price" => "required"
            ],
            [
            	"typeroom.required"        => "Bạn chưa chọn loại phòng ",
                "name.required"            => "Bạn chưa nhập tên phòng ",
                "name.unique"              => "Tên phòng này đã tồn tại ",
                "price.required"			=> "Bạn chưa nhập giá phòng"
            ]);
    	$room              = new Room;
    	$room->name        = $req->name;
    	$room->typeroom_id = $req->typeroom; // đang thắc mắc chỗ này
    	$room->price       = $req->price;
    	$room->status      = $req->status;
    	$room->save();
    	// var_dump($district->save()); exit();
    	return redirect("admin/room/list")->with("thongbao", "Thêm thành công ! ");
    }

}
