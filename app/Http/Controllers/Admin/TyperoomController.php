<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Typeroom;
use File;
class TyperoomController extends Controller
{
    public function getList() {
        $typeroom = Typeroom::all();
        return view("admin.type_room.list", ["typeroom" => $typeroom]);
    }

    public function getDelete($id) {
    	$type = Typeroom::find($id);
      /*Xoa hinh cu*/
      if(File::exists('upload/hinhloaiphong/' . $type->image)){
        File::delete('upload/hinhloaiphong/' . $type->image);
      }
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
                "capacity"    => "required",
            ],
            [
                "name.required"        => "Bạn chưa nhập tên phòng ",
                "capacity.required"    => "Bạn chưa nhập sức chứa",
            ]);
        // var_dump($req->name); exit();
        $typeroom = new Typeroom;
        $typeroom->name = $req->name;
        $typeroom->maxpeople = $req->capacity;
        if($req->hasFile('image')){
            $file = $req->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('admin/typeroom/add/')->with('thongbao', 'bạn chỉ được chọn file vơi đuôi png, jpg, jpeg');
            }
            $duoi  = $file->getClientOriginalName();
            $image = str_random(4)."-".$duoi;
            while(file_exists("upload/hinhloaiphong/".$image)){
                $image = str_random(4)."-".$duoi;
            }
            $file->move("upload/hinhloaiphong", $image);
            $typeroom->image = $image;
        }
        $typeroom->save();

        return redirect("admin/typeroom/list")->with("thongbao", "Thêm thành công ! ");
    }

    public function getEdit($id){
    	$typeroom = Typeroom::find($id);
    	return view('admin.type_room.edit', ['typeroom' => $typeroom]);
    }

    public function postEdit(Request $req, $id){
    	  $typeroom = Typeroom::find($id);
        $this->validate($req,
            [
                "name"        => "required|min:3|max:32",
                "capacity"    => "required",
            ],
            [
                "name.required"        => "Bạn chưa nhập tên loại phòng",
                "capacity.required"    => "Bạn chưa nhập sức chứa",
            ]);
        $typeroom->name = $req->name;
        $typeroom->maxpeople = $req->capacity;
        if($req->hasFile('image')){
            $file = $req->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('admin/typeroom/edit/' . $id)->with('thongbao', 'bạn chỉ được chọn file vơi đuôi png, jpg, jpeg');
            }
            $duoi  = $file->getClientOriginalName();
            $image = str_random(4)."-".$duoi;
            while(file_exists("upload/hinhloaiphong/".$image)){
                $image = str_random(4)."-".$duoi;
            }
            $file->move("upload/hinhloaiphong", $image);
            /*Xoa hinh cu*/
            if(File::exists('upload/hinhloaiphong/' . $typeroom->image)){
              File::delete('upload/hinhloaiphong/' . $typeroom->image);
            }
            $typeroom->image = $image;
        }
        $typeroom->save();

        return redirect('admin/typeroom/edit/'.$id)->with("thongbao", "Sửa thành công ! ");
    }
}
