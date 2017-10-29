<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Province;
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
            ],
            [
                "name.required"        => "Bạn chưa nhập tên tỉnh/thành phố ",
            ]);
        // var_dump($req->name); exit();
        $province = new Province;
        $province->name = $req->name;
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
                "name"        => "required|unique:province,name|min:3|max:32",
            ],
            [
                "name.required"        => "Bạn chưa nhập tên tỉnh/thành phố ",
                "name.unique"          => "Tên Tỉnh/Thành phố này đã bị trùng ",
            ]);
        $province->name = $req->name;
        // dd($req->name); die();
        $province->save();

        return redirect('admin/province/edit/'.$id)->with("thongbao", "Sửa thành công ! ");
    }
    public function getDelete($id){
        $province = Province::find($id); // ở đây model Tỉnh
        $province->delete();
        return redirect('admin/province/list')->with('thongbao', 'xóa thành công');
    }
}
