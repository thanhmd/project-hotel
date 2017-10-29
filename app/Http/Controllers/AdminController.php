<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    //
    
    // public function getLoginAdmin() {
    // 	return view("admin.login");
    // }
    //public function postLoginAdmin(Request $req) {
    //	$this->validate($req, 
    //	[
    //		"email"    => "required";
    //		"password" => "required|min:3|max:32";
    //	],
    //	[
    //		"email.required"    => "Vui lòng nhập email";
    //		"password.required" => "Vui lòng nhập password";
    //		"password.min"      => "Mật khẩu tối thiểu 3 kí tự";
    //		"password.max"      => "Mật khẩu tối đa 6 kí tự";
    //	]);
    //
    //}
    
    // public function getList() {
    //     $admin = User::all();
    //     return view("admin.admin.list", ["admin" => $admin]);
    // }

    public function getAdd() {
        return view("admin.admin.add");
    }  

    public function postAdd(Request $req) {
        $this->validate($req,
            [
                "name"        => "required|min:3|max:32",
                "email"       => "required|email|unique:admin,email", // unique in table admin column email
                "password"    => "required|min:3|max:32",
                "re_password" => "required|same:password",
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
            ]);
        // var_dump($req->name); exit();
        $admin = new User;
        $admin->full_name = $req->name;
        $admin->email = $req->email;
        $admin->password = bcrypt($req->password);
        $admin->level = $req->level;
        $admin->save();

        return redirect("admin/admin/add")->with("thongbao", "Thêm thành công ! ");
    }
}
