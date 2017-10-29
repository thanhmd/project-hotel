<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Typeroom;
class TyperoomController extends Controller
{
    public function getList() {
        $typeroom = Typeroom::all();
        return view("admin.type_room.list", ["typeroom" => $typeroom]);
    }
    // Thành làm cái xóa loại Phòng vs xóa Phòng dc ko
    //T thấy xoa phải sd model pk?, ukm model H tạo rồi đó, vd cái xóa tỉnh nha

    public function getDelete($id) {
    	$type = Typeroom::find($id);
    	$type -> delete();
    	return redirect('admin/typeroom/list')->with('thongbao', 'xóa thành công');
    }

    public function getAdd(){
    	return view('admin.type_room.add');
    }

    public function postAdd(Request $req){
    	$this->validate($req,
            [
                "name"        => "required|min:3|max:32",
            ],
            [
                "name.required"        => "Bạn chưa nhập tên phòng ",
            ]);
        // var_dump($req->name); exit();
        $typeroom = new Typeroom;
        $typeroom->name = $req->name;
        $typeroom->save();

        return redirect("admin/typeroom/list")->with("thongbao", "Thêm thành công ! ");
    }
}
