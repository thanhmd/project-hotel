<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // thư viện login
use App\User;
class UnithotelController extends Controller
{
    public function getAddinfo() {
    	return view("unithotel.info.add");
    }
    public function getAddroom() {
    	return view("unithotel.room.add");
    }
    public function getPlaceofthought() {
    	return view("unithotel.placeofthought.add");
    }
    public function getLogin(){
    	return view("unithotel.login_and_register_tabbed_form");
    }
    public function postLogin(Request $req){
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

    	if(Auth::attempt(['email'=>$req->email,'password'=>$req->password ])) {
            return redirect("unithotel/info/home");
        }
        else {
            return redirect("unithotel/login")->with("thongbao", " Đăng nhập không thành công. Hãy kiểm tra lại! Nếu chưa có tài khoản vui lòng đăng ký");
        }   
    }
    public function getRegister(){
    	return view("unithotel.login_and_register_tabbed_form");
    }
    public function postRegister(Request $req) {
    	$this->validate($req,
            [
                "name"          => "required|min:3|max:32",
                "email"         => "required|email|unique:users,email", // unique in table admin column email
                "sdt"           => "required",
                "cmnd_passport" => "required|unique:users,cmnd_passport",
                "address"       => "required|",
                "password"      => "required|min:3|max:32",
                "re_password"   => "required|same:password",
            ],
            [
                "name.required"          => "Bạn chưa nhập tên người dùng ",
                "name.min"               => "Tên người dùng phải có ít nhất 3 kí tự",
                "name.max"               => "Tên người dùng phải tối đa kí tự",
                "email.required"         => "Bạn chưa nhập email",
                "email.email"            => "Bạn chưa nhập đúng định dạng email",
                "email.unique"           => "Email này đã tồn tại",
                "sdt.required"           => "Bạn chưa nhập SĐT",
                "cmnd_passport.required" => "Bạn chưa nhập CMND hoặc hộ chiếu",
                "cmnd_passport.unique"   => "CMND hoặc hộ chiếu này đã tồn tại",
                "address.required"       => "Bạn chưa nhập địa chỉ",
                "password.required"      => "Bạn chưa nhập mật khẩu",
                "password.min"           => "Mật khẩu phải có it nhất 3 kí tự",
                "passwoed.max"           => "Mật khẩu phải có tối đa 32 kí tự",
                "re_password.required"   => "Bạn chưa nhập lại mật khẩu",
                "re_password.same"       => "Mật khẩu không khớp",
            ]);
        // var_dump($req->name); exit();
        $user           = new User;
        $user->name     = $req->name;
        $user->email    = $req->email;
        $user->sdt      = $req->sdt;
        $user->cmnd_passport = $req->cmnd_passport;
        $user->address       = $req->address;
        $user->password      = bcrypt($req->password);
        $user->level         = 1;
        $user->save();
        return redirect("unithotel/login")->with("thongbao1", " Đăng ký thành công ! ");
    }
    public function getLogout() {
    	Auth::logout();
    	return redirect("unithotel/login");
    }
    public function getindex() {
        return view("unithotel.info.homeunithotel");
    }
    public function getProfile(){
        $user = Auth::user();
        return view("unithotel.info.profilehotel", ['user'=>$user]);
    }
    public function getEditProfile(){
        $user = Auth::user();
        return view("unithotel.info.editprofile", ['user'=>$user]);
    }
    public function postEditProfile(Request $req){
        $user = Auth::user();
        $this->validate($req, [
                'name'        => 'required',
                'sdt'         => 'required',
                // "password"      => "required|min:3|max:32",
                // "passwordAgain" => "required|same:password",
                // "address"       => "required",

            ],
            [
                'name.required'     => 'Bạn chưa nhập tên',
                'sdt.required'      => 'Bạn chưa nhập sđt',
                'addpress.required' => 'Bạn chưa nhập địa chỉ',
                // "password.min"         => "Mật khẩu phải có it nhất 3 kí tự",
                // "passwoed.max"         => "Mật khẩu phải có tối đa 32 kí tự",
                // "passwordAgain.required" => "Bạn chưa nhập lại mật khẩu",
                // "passwordAgain.same"     => "Mật khẩu không khớp",
            ]);
        $user->name= $req->name;
        $user->sdt = $req->sdt;
        $user->address = $req->address;
        if($req->changePassword == "on"){
            $this->validate($req, [
                "password"      => "required|min:3|max:32",
                "passwordAgain" => "required|same:password",
                "address"       => "required",

            ],
            [
                "password.min"         => "Mật khẩu phải có it nhất 3 kí tự",
                "passwoed.max"         => "Mật khẩu phải có tối đa 32 kí tự",
                "passwordAgain.required" => "Bạn chưa nhập lại mật khẩu",
                "passwordAgain.same"     => "Mật khẩu không khớp",
            ]);
            $user->password = bcrypt($req->password);
        }
        $user->save();
        return redirect('unithotel/info/profile')->with('thongbao', 'sửa thành công');
    }
}
