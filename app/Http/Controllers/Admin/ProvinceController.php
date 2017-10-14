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
}
