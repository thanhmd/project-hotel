<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Typeservice;
class ServiceController extends Controller
{
    public function getList() {
        $service = Service::all();
        return view("admin.service.list", ["service" => $service]);
    }
    public function getAdd() {
        $typeservice = Typeservice::all();
        return view("admin.service.add", ['typeservice' => $typeservice]);
    }
    public function postAdd(Request $req) {
        $this->validate($req,
            [
                "typeservice"             => "required",
                "name"             => "required|unique:service,name",
            ],
            [
                "typeservice.required"        => "Bạn chưa chọn loại dịch vụ",
                "name.required"            => "Bạn chưa nhập tên dịch vụ ",
                "name.unique"              => "Tên dịch vụ đã tồn tại ",
            ]);
        $service             = new Service;
        $service->name       = $req->name;
        $service->typeservice_id = $req->typeservice;
        $service->save();
        // var_dump($district->save()); exit();
        return redirect("admin/service/list")->with("thongbao", "Thêm thành công ! ");
    }
    public function getEdit($id){
        $service = Service::find($id);
        $typeservice = Typeservice::all();
        return view("admin.service.edit", ["service" => $service, "typeservice" => $typeservice]);
    }
    public function postEdit(Request $req, $id) {
        $this->validate($req, [
                'name'  => 'required',
                'typeservice'=> 'required',
            ],
            [
                'name.required' => 'Bạn chưa nhập tên dịch vụ',
                'typeservice.required'       => 'Bạn chưa chọn loại dịch vụ'
            ]);
        $service = Service::find($id);
        // dd($req->name); exit();
        $service->name= $req->name;
        $service->typeservice_id   = $req->typeservice;
        $service->save();
        return redirect('admin/service/edit/'.$id)->with('thongbao', 'sửa thành công');

    }
    public function getDelete($id){
        $service = Service::find($id);
        $service->delete();
        return redirect('admin/service/list')->with('thongbao', 'xóa thành công');
    } 
}

// Hello GIT