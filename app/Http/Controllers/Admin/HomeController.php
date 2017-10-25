<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // library login
use App\User;

class HomeController extends Controller
{
	public function __construct()
	{
        // $this->middleware('auth');
	}

	public function index(){
        return view("admin.trangchuadmin");
	}
	public function getLoginAdmin() {
		return view("admin.login");
	}
	public function postLoginAdmin(Request $req){
    	// var_dump($req->email); exit();
		$this->validate($req,
			[
				"email"    => "required",
				"password" =>  "required|min:3|max:32",
			],
			[
				"email.required"    => "Bạn chưa nhập email",
				"password.required" => "Bạn chưa nhập password",
				"password.min"      => "Mật khẩu tối thiểu 3 kí tự",
				"password.max"      => "Mật khẩu tối đa 32 kí tự",
			]
		);
		//var_dump(Auth::attempt(['email'=>$req->email,'password'=>$req->password ])); exit();
		if(Auth::attempt(['email'=>$req->email,'password'=>$req->password ])) {
			return redirect("admin/trangchu");
		}
		else {
			return redirect("admin/login")->with("thongbao", "Đăng nhập không thành công");
		}   
	}
	public function getLogout() {
    	Auth::logout();
    	return redirect("admin/logout");
    }

}
