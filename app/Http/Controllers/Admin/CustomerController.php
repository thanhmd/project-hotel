<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use App\Quotation;
class CustomerController extends Controller
{
    public function getList() {
        $customer =  DB::table('users')->where('level', 0)->get();
        // var_dump($customer); exit();
        return view("admin.customer.list", ["customer" => $customer]);
    }
    public function getAdd(){
    	return view("admin.customer.add");
    }
    public function postAdd(Request $req){
    	$this->validate($req,
            [
                "name"        => "required|min:3|max:32",
                "email"       => "required|email|unique:users,email", // unique in table admin column email
                "password"    => "required|min:3|max:32",
                "re_password" => "required|same:password",
                'sdt'         => "required" ,
            ],
            [
                "name.required"        => "Bạn chưa nhập tên người dùng ",
                "name.min"             => "Tên người dùng phải có ít nhất 3 kí tự",
                "name.max"             => "Tên người dùng phải tối đa kí tự",
                "email.required"       => "Bạn chưa nhập email",
                "email.email"          => "Bạn chưa nhập đúng định dạng email",
                "email.unique"         => "Email này đã tồn tại",
                "password.required"    =>  "Bạn chưa nhập mật khẩu",
                "password.min"         => "Mật khẩu phải có it nhất 3 kí tự",
                "passwoed.max"         => "Mật khẩu phải có tối đa 32 kí tự",
                "re_password.required" => "Bạn chưa nhập lại mật khẩu",
                "re_password.same"     => "Mật khẩu không khớp",
                "sdt.required"         => "Số điện thoại chưa nhâp",
            ]);
        // var_dump($req->name); exit();
        $customer = new User;
        $customer->name = $req->name;
        $customer->email = $req->email;
        $customer->password = bcrypt($req->password);
        $customer->level = 0;
        $customer->save();

        return redirect("admin/customer/add")->with("thongbao", "Thêm khách hàng thành công ! ");
    }
    public function getDelete($id) {
        $customer = User::find($id);
        $customer->delete();
        return redirect('admin/customer/list')->with('thongbao', 'xóa khách hàng thành công');
    }
}
