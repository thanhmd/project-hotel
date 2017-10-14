<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
class ServiceController extends Controller
{
    public function getList() {
        // get list user
        $service = Service::all();
        return view("admin.service.list", ["service" => $service]);
    }
    public function getAdd() {
        return view("admin.service.add");
    }
    public function postAdd(Request $req) {
    	 $this->validate($req,
            [
                "name"        => "required|min:3|max:32",
            ],
            [
                "name.required"        => "Bạn chưa nhập tên dịch vụ ",
            ]);
        // var_dump($req->name); exit();
        $service = new Service;
        $service->name = $req->name;
        $service->save();

        return redirect("admin/service/add")->with("thongbao", "Thêm thành công ! ");
    } 
}
