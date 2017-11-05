<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Typeservice;
class TypeserviceController extends Controller
{
    public function getList(){
    	$typeservice = Typeservice::all();
    	return view("admin.typeservice.list", ["typeservice" => $typeservice]);
    }
    public function getAdd() {
        return view("admin.typeservice.add");
    }
    public function postAdd(Request $req) {
    	 $this->validate($req,
            [
                "name"                 => "required|min:3|max:32",
            ],
            [
                "name.required"        => "Bạn chưa nhập tên loại dịch vụ",
            ]);
        // var_dump($req->name); exit();
        $typeservice = new Typeservice;
        $typeservice->service = $req->name;
        $typeservice->save();
        return redirect("admin/typeservice/add")->with("thongbao", "Thêm thành công ! ");
    }
    public function getEdit($id){
        $typeservice = Typeservice::find($id);
        return view("admin.typeservice.edit", ["typeservice" => $typeservice]);
    }
    public function postEdit(Request $req, $id){
        $typeservice = Typeservice::find($id);
        $this->validate($req,
            [
                "name"                 => "required|unique:type_service,service|min:3|max:32",
            ],
            [
                "name.required"        => "Bạn chưa nhập tên loại dịch vụ ",
                "name.unique"          => "Tên Loại Dịch Vụ này đã bị trùng ",
            ]);
        $typeservice->service = $req->name;
        // dd($req->name); die();
        $typeservice->save();
        return redirect('admin/typeservice/edit/'.$id)->with("thongbao", "Sửa thành công ! ");
    }
    public function getDelete($id){
        $typeservice = Typeservice::find($id);
        $typeservice->delete();
        return redirect('admin/typeservice/list')->with('thongbao', 'xóa thành công');
    }
}
