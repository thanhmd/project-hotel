<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Province;
use File;
class ProvinceController extends Controller
{
    public function getList() {
        // get list user
        $province = Province::all();
        return view("admin.province.list", ["province" => $province]);
    }
    public function getAdd() {
        return view("admin.province.add");
    }
    public function postAdd(Request $req) {
    	 $this->validate($req,
            [
                "name"        => "required|min:3|max:32",
                "description" => "required",
            ],
            [
                "name.required"        => "Bạn chưa nhập tên tỉnh/thành phố ",
                "description.required" => "Bạn chưa nhập mô tả",
            ]);
        // var_dump($req->name); exit();
        $province = new Province;
        $province->name = $req->name;
        $province->description = $req->description;
        if($req->hasFile('image')){
            $file = $req->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('admin/province/add/')->with('thongbao', 'bạn chỉ được chọn file vơi đuôi png, jpg, jpeg');
            }
            $duoi  = $file->getClientOriginalName();
            $image = str_random(4)."-".$duoi;
            while(file_exists("upload/hinhtinh/".$image)){
                $image = str_random(4)."-".$duoi;
            }
            $file->move("upload/hinhtinh", $image);
            $province->image = $image;
        }
        $province->save();

        return redirect("admin/province/add")->with("thongbao", "Thêm thành công ! ");
    }
    public function getEdit($id){
        $province = Province::find($id);
        return view("admin.province.edit", ["province" => $province]);
    }
    public function postEdit(Request $req, $id){
        $province = Province::find($id);
        $this->validate($req,
            [
                "name"        => "required",
                "description" => "required",
            ],
            [
                "name.required"        => "Bạn chưa nhập tên tỉnh/thành phố ",
                "description.required" => "Bạn chưa nhập mô tả",
            ]);
        $province->name = $req->name;
        $province->description = $req->description;
        if($req->hasFile('image')){
            $file = $req->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('admin/province/edit/'. $id)->with('thongbao', 'bạn chỉ được chọn file vơi đuôi png, jpg, jpeg');
            }
            $duoi  = $file->getClientOriginalName();
            $image = str_random(4)."-".$duoi;
            while(file_exists("upload/hinhtinh/".$image)){
                $image = str_random(4)."-".$duoi;
            }
            $file->move("upload/hinhtinh", $image);
            /*Xoa hinh cu*/
            if(File::exists('upload/hinhtinh/' . $province->image)){
              File::delete('upload/hinhtinh/' . $province->image);
            }
            $province->image = $image;
        }
        $province->save();
        return redirect('admin/province/edit/'.$id)->with("thongbao", "Sửa thành công ! ");
    }
    public function getDelete($id){
        $province = Province::find($id); // ở đây model Tỉnh
        if(count($province->district()->get()) > 0){
          return redirect('admin/province/list/')->with('thongbao', 'Không xóa được, hãy xóa các quận/huyện tương ứng !');
        }
        if(File::exists('upload/hinhtinh/' . $province->image)){
          File::delete('upload/hinhtinh/' . $province->image);
        }
        $province->delete();
        return redirect('admin/province/list')->with('thongbao', 'xóa thành công');
    }
    public function getDistricts($id){
        $province = Province::find($id);
        return $province->district()->select('id', 'name')->get();
    }
}
