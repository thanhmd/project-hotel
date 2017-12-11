<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\District;
use App\Province;
class DistrictController extends Controller
{
    public function getList() {
    	$district = District::all();
    	$province = Province::all();
        return view("admin.district.list", ["district" => $district, "province" => $province]);
    }
    public function getAdd() {
    	$province = Province::all();
    	return view("admin.district.add", ["province" => $province]);
    }
    public function postAdd(Request $req) {
    	$this->validate($req,
            [
                "province"                 => "required",
                "name"                     => "required|unique:district,name",
            ],
            [
            	"province.required"        => "Bạn chưa chọn tỉnh/thành phố ",
                "name.required"            => "Bạn chưa nhập tên quận/huyện ",
                "name.unique"              => "Tên quận/huyện này đã tồn tại ",
            ]);
    	$district             = new District;
    	$district->name       = $req->name;
    	$district->province_id = $req->province;
    	$district->save();
    	// var_dump($district->save()); exit();
    	return redirect("admin/district/list")->with("thongbao", "Thêm thành công ! ");
    }
    public function getDelete($id){
        $district = District::find($id); // cai này model quận , huện
        $district->delete();
        return redirect('admin/district/list')->with('thongbao', 'xóa thành công');
    }
    public function getEdit($id) {
        $province = Province::all();
        $district = District::find($id);
        return view('admin.district.edit', ['province'=>$province, 'district'=>$district]);
    }
    public function postEdit(Request $req, $id) {
        $this->validate($req, [
                'name'          => 'required',
                'province'      => 'required',
            ],
            [
                'name.required' => 'Bạn chưa nhập tên quận, huyện',
                'theloai.required'       => 'Ban chua chon the loai',
            ]);
        $district = District::find($id);
        $district->name= $req->name;
        $district->province_id   = $req->province;
        $district->save();
        return redirect("admin/district/list")->with('thongbao', 'sửa thành công');
    }
}
