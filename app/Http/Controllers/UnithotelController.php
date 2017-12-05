<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // thư viện login
use App\User;
use App\Customer;
use Hash;
use App\District;
use App\Province;
use App\Hotel;
use App\Typeroom;
use App\Service;
use App\DetailHotelService;
use App\DetailHotelTyperoom;
use App\Listimageshotel;
use File;

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
    	// var_dump($req->password); exit();
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
        // var_dump(Auth::attempt(['email'=>$req->email,'password'=>$req->password ])); exit();
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

        $user           = new User;
        $user->name     = $req->name;
        $user->email    = $req->email;
        $user->sdt      = $req->sdt;
        $user->cmnd_passport = $req->cmnd_passport;
        $user->address       = $req->address;

        $user->password      = Hash::make($req->password);
        // var_dump(Hash::make($req->password)); echo "<br/>";
        // var_dump($user->password); exit();

        //$user->password      = Hash::make($req->password);
        $user->level         = 1;
        $user->status        = 1;

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
        // if($req->changePassword == "on"){
        //     $this->validate($req, [
        //         "password"      => "required|min:3|max:32",
        //         "passwordAgain" => "required|same:password",
        //         "address"       => "required",

        //     ],
        //     [
        //         "password.min"           => "Mật khẩu phải có it nhất 3 kí tự",
        //         "passwoed.max"           => "Mật khẩu phải có tối đa 32 kí tự",
        //         "passwordAgain.required" => "Bạn chưa nhập lại mật khẩu",
        //         "passwordAgain.same"     => "Mật khẩu không khớp",
        //     ]);
        //     $user->password = Hash::make($req->password);
        // }
        //
        // var_dump($req->hasFile('image')); exit();
        if($req->hasFile('image')){
            $file = $req->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('unithotel/info/editprofile')->with('thongbao', 'bạn chỉ được chọn file vơi đuôi png, jpg, jpeg');
            }
            $duoi  = $file->getClientOriginalName();
            $image = str_random(4)."-".$duoi;
            while(file_exists("upload/imageuser/".$image)){
                $image = str_random(4)."-".$duoi;
            }
            $file->move("upload/imageuser", $image);
            $user->image =$image;

        }else {
            $user->image = "ko co hinh";
        }
        // var_dump($user->image); exit();
        $user->save();
        return redirect('unithotel/info/profile')->with('thongbao', 'sửa thành công');
    }
    // public function getListhotel(){
    //     return view("unithotel.hotel.listhotel");
    // }

    public function getChangepassword(){
        $user = Auth::user();
        return view("unithotel.info.changepassword", ['user'=>$user]);
    }
    public function postChangepassword(Request $req){
        $user = Auth::user();
        $this->validate($req, [
            "cur_password"            => "required",
            "new_password"            => "required|min:3|max:32",
            "renew_password"          => "required|same:new_password",

        ],

        [
            "new_password.min"         => "Mật khẩu mới phải có it nhất 3 kí tự",
            "new_password.max"         => "Mật khẩu mới phải có tối đa 32 kí tự",
            "cur_password.required"    => "Bạn chưa nhập lại mật khẩu cũ",
            "renew_password.required"  => "Bạn chưa nhập lại mật khẩu",
            "renew_password.same"      => "Mật khẩu không khớp",
        ]);
            //var_dump( $user->password ); echo "<br>";
            if(Hash::check($req->cur_password , $user->password ))
            {
                $user->password = Hash::make($req->new_password);
                $user->save();
                return redirect("unithotel/info/profile")->with("thongbao", "Đổi mật khẩu thành công!");
                // echo "string";
            }else {
                return redirect("unithotel/info/changepassword")->with("thongbao", "Mật khẩu của bạn không đúng, kiểm tra lại ! ");
            }

    }
    public function getListhotel(){
        $customer = Customer::find(Auth::user()->id);
        $hotels    = $customer->hotel()->get();
        return view("unithotel.hotel.listhotel", ['hotels'=>$hotels]);
    }
    public function getAddhotel() {
        $provinces = Province::all();
        $services  = Service::all();
        $typerooms = Typeroom::all();
        return view("unithotel.hotel.addhotel", ['provinces' => $provinces, 'typerooms' => $typerooms, 'services' => $services]);
    }
    public function postAddhotel(Request $req) {
        $this->validate($req,
        [
            "address_detail" => "required",
            "name"              => "required",
            "province"          => "required",
            "district"          => "required",
        ],
        [
            "address_detail.required" => "Bạn chưa nhập địa chỉ chi tiết",
            "name.required"     => "Bạn chưa nhập tên khách sạn",
            "province.required"         => "Bạn chưa chọn tỉnh/thành phố",
            "district.required"         =>  "Bạn chưa chọn quận/huyện",
        ]);
        $hotel                 = new Hotel();
        $hotel->name           = $req->name;
        $hotel->star           = $req->star;
        $hotel->description    = $req->description;
        $hotel->address_detail = $req->address_detail;
        $hotel->province_id    = $req->province;
        $hotel->district_id    = $req->district;
        $hotel->id_owner       = Auth::user()->id;
        if($req->hasFile('image')){
         $file = $req->file('image');
         $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('unithotel/hotel/add')->with('thongbao', 'bạn chỉ được chọn file vơi đuôi png, jpg, jpeg');
            }
            $duoi  = $file->getClientOriginalName();
            $image = str_random(4)."-".$duoi;
            while(file_exists("upload/hinhkhachsan/".$image)){
                $image = str_random(4)."-".$duoi;
            }
            $file->move("upload/hinhkhachsan", $image);
            $hotel->image =$image;

        }
        $hotel->save();
        if($req->hasFile('detailpics')){
            $detailpics = $req->file('detailpics');
            if(!empty($detailpics)){
              foreach ($detailpics as $file) {
                $duoi = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                    return redirect('unithotel/hotel/add')->with('thongbao', 'bạn chỉ được chọn file vơi đuôi png, jpg, jpeg');
                }
                $duoi  = $file->getClientOriginalName();
                $image = str_random(4)."-".$duoi;
                while(file_exists("upload/hinhkschitiet/".$image)){
                    $image = str_random(4)."-".$duoi;
                }
                $file->move("upload/hinhkschitiet", $image);
                $detailpic = new Listimageshotel();
                $detailpic->name=$image;
                $detailpic->hotel_id=$hotel->id;
                $detailpic->save();
              }
            }
        }
        for ($i = 0; $i < count($req->serviceid); $i++) {
            /*Khoi tao doi tuong chi tiet phong*/
            $detail_service = new DetailHotelService();
             $detail_service -> name = $req->nameservice[$i]; // mac dinh ten dich vu rieng bang ten dich vu cua admin
             $detail_service -> hotel_id = $hotel->id;
             $detail_service -> service_id = $req->serviceid[$i];
             $detail_service -> price = $req->priceservice[$i]; // gan cung tam thoi, hoac co the bo sung them o giao dien
             $detail_service -> save();
        }
        //Moi loai phong se tao ra nhieu phong
        for ($i = 0; $i < count($req->typeroomid); $i++) {
            /*Khoi tao doi tuong chi tiet phong*/
            if($req->numbertyperoom[$i] != 0){ // chi tao ra cac phong khi so phong != 0
                $numberObj = $req->numbertyperoom[$i]; //$numberObj : luu so phong cua moi loai
                for($j = 0; $j < $numberObj; $j++){
                    $detail_room = new DetailHotelTyperoom();
                    $detail_room -> hotel_id = $hotel->id;
                    $detail_room -> typeroom_id = $req->typeroomid[$i];
                    $detail_room -> name = $req->nametyperoom[$i];
                    $detail_room -> price = $req->pricetyperoom[$i];
                    $detail_room -> status = 0;
                    $detail_room -> maxpeople = $req->capacitytyperoom[$i]; // gan tam
                    $detail_room -> save();
                }
            }
        }
        return redirect("unithotel/hotel/add")->with("thongbao", "Thêm khách sạn thành công !Tiếp tục thêm khách sạn hoặc chọn menu để chuyển tác vụ");
    }
    public function getEdithotel($id) {
        $hotel = Hotel::find($id);
        $province = Province::all();
        $district = District::all();
        return view("unithotel.hotel.edithotel", ['province' => $province, 'hotel' => $hotel, 'district' => $district]);
    }
    public function postEdithotel(Request $req, $id) {
        $this->validate($req,
        [
            "province"          => "required",
            "district"          => "required",
        ],
        [
            "province.required"         => "Bạn chưa chọn tỉnh/thành phố",
            "district.required"         =>  "Bạn chưa chọn quận/huyện",
        ]);
        $hotel                 = Hotel::find($id);
        $hotel->name           = $req->name;
        $hotel->star           = $req->star;
        $hotel->description    = $req->description;
        $hotel->address_detail = $req->address_detail;
        $hotel->province_id    = $req->province;
        $hotel->district_id    = $req->district;
        if($req->hasFile('image')){
            $file = $req->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('unithotel/hotel/add')->with('thongbao', 'bạn chỉ được chọn file vơi đuôi png, jpg, jpeg');
            }
            $duoi  = $file->getClientOriginalName();
            $image = str_random(4)."-".$duoi;
            while(file_exists("upload/hinhkhachsan/".$image)){
                $image = str_random(4)."-".$duoi;
            }
            $file->move("upload/hinhkhachsan", $image);
            /*Xoa hinh khach san cu*/
            if(File::exists('upload/hinhkhachsan/' . $hotel->image)){
              File::delete('upload/hinhkhachsan/' . $hotel->image);
            }
            $hotel->image =$image;
        }
        if($req->hasFile('detailpics')){
            $detailpics = $req->file('detailpics');
            if(!empty($detailpics)){
              /*Tim ten anh chi tiet cu*/
              $deleted_imgs = [];
              foreach ($hotel->images()->get() as $image) {
                if(File::exists('upload/hinhkschitiet/' . $image->name)){
                  //File::delete('public/hinhkschitiet/' . $image->name);
                  $deleted_imgs[] = 'upload/hinhkschitiet/' . $image->name;
                }
              }
              $detailpic_array = [];
              foreach ($detailpics as $file) {
                $duoi = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                    return redirect('unithotel/hotel/add')->with('thongbao', 'bạn chỉ được chọn file vơi đuôi png, jpg, jpeg');
                }
                $duoi  = $file->getClientOriginalName();
                $image = str_random(4)."-".$duoi;
                while(file_exists("upload/hinhkschitiet/".$image)){
                    $image = str_random(4)."-".$duoi;
                }
                $file->move("upload/hinhkschitiet", $image);
                $detailpic = new Listimageshotel();
                $detailpic->name=$image;
                $detailpic->hotel_id=$id;
                $detailpic_array[] = $detailpic;
                //$detailpic->save();
              }
              /*Xoa hinh chi tiet cu*/
              if(count($deleted_imgs) > 0){
                File::delete($deleted_imgs);//file
                $hotel->images()->delete(); //DB
              }
              foreach ($detailpic_array as $detailpic) {
                $detailpic->save(); // DB
              }
            }
        }
        $hotel->save();
        return redirect('unithotel/hotel/edit/' . $id)->with('thongbao', 'Sửa thành công');
    }
    public function getDeleteHotel($id){
        // Khi xoa khach san thi phai xoaa hinh, chi tiet dich vu va phong
        $hotel =  Hotel::find($id);
        $hotel -> service_detail() -> delete();
        $hotel -> typeroom_detail() -> delete();
        /*Xoa hinh chi tiet cu*/
        foreach ($hotel->images()->get() as $image) {
          if(File::exists('upload/hinhkschitiet/' . $image->name)){
            File::delete('upload/hinhkschitiet/' . $image->name);
          }
        }
        /*Xoa hinh khach san cu*/
        if(File::exists('upload/hinhkhachsan/' . $hotel->image)){
          File::delete('upload/hinhkhachsan/' . $hotel->image);
        }
        $hotel -> images() -> delete();
        $hotel -> delete();
        return redirect('unithotel/hotel/list')->with('thongbao', 'Xóa khách sạn thành công');
    }
    public function getDeleteAccount(){
        $user = User::find(Auth::user()->id);
        Auth::logout();
        if ($user->delete())
             return Redirect('unithotel/login')->with('thongbao', 'Tài khoản của bạn đã xóa!');
    }
}
