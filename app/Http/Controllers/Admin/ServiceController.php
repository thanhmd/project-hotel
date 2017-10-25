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
    public function getEdit($id){
        $service = Service::find($id);
        return view("admin.service.edit", ["service" => $service]);
    }
    public function postEdit(Request $req, $id){
        $service = Service::find($id);
        $this->validate($req,
            [
                "name"                => "required|unique:service,name|min:3|max:32",
            ],
            [
                "name.required"        => "Bạn chưa nhập tên tỉnh/thành phố ",
                "name.unique"          => "Tên Dịch vụ này đã bị trùng ",
            ]);
        $service->name = $req->name;
        // dd($req->name); die();
        $service->save();

        return redirect('admin/service/edit/'.$id)->with("thongbao", "Sửa thành công ! ");
    }
    public function getDelete($id){
        $service = Service::find($id);
        $service->delete();
        return redirect('admin/service/list')->with('thongbao', 'xóa thành công');
    } 
}
