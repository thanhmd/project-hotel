<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Province;
use App\District;
use App\Hotel;
use App\Listimageshotel;
use App\Typeroom;
use App\DetailHotelService;
use App\DetailHotelTyperoom;
class PagesController extends Controller
{
    public function xuli() {
        if(isset($_POST['send'])) {
            // $error ="";
            // include(storage_path("mail/PHPMailerAutoload.php"));
            // $mail = new \PHPMailer;
            // $mail->isSMTP();
            // $mail->Host = 'smtp.gmail.com';

            // $mail->SMTPAuth = true;
            // $mail->Username = 'tranthihonghue19it@gmail.com';
            // $mail->Password = 'lkd01694993575';
            // //$mail->SMTPSecure = 'tls';
            // $mail->SMTPSecure = 'ssl';
            // //$mail->Port = 587;
            // $mail->Port = 465;

            // $mail->CharSet = 'utf-8';
            // //$mail->SMTPDebug = 2;
            // $mail->setFrom($_POST['email']);
            // $mail->addReplyTo($_POST['email'], 'Information');
            // $mail->addAddress('tranthihonghue19it@gmail.com', 'Information');
            // $mail->Subject = "THƯ THẮC MAắc";

            // $mail->Body    = "Họ và tên : ".$_POST['name']."<br>Số điện thoại : ".$_POST["sdt"]."<br> Thành phố :".$_POST["city"]."<br>Email : ".$_POST['email']."<br>Loại Hình : ".$loaihinh;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            // if(!$mail->send()) {
            //    $error =  'Message could not be sent. |hotro.hune@gmail.com/minhquan1510| Mailer Error: ' . $mail->ErrorInfo;;

            // } else {
            //    $error =  'Tin nhắn đã được gởi thành công';
            // }
            echo "ok";
           //return redirect()->back()->with('thongbao1', $error);
        }
        echo "no ok";
        //return redirect()->back()->with('thongbao1', 'khong gui duoc');

    }
    public function getRegister() {
    	return view("pages.register");
    }
    public function getHome(){
    	$province = Province::all();
        $hotel    = Hotel::paginate(3);
        return view("pages.home", ["province" => $province, "hotel" => $hotel]);
    }
    public function getListhotelByprovince($province_id) {
    	// lấy tất cả các khách sạn theo tỉnh, province_id: cột trong database, $province_id : tham số truyền vào
    	$province 			= Province::findOrFail($province_id);
    	$hotelByProvince 	= Hotel::where('province_id',$province_id)->where('status',1)->get();
      $service_hotel      = DetailHotelService::all();
    	//print_r($province['name']); exit();
    	//dd($service_hotel);
    	return view("pages.list-province", compact('hotelByProvince', 'province', 'service_hotel' ));
    }
    public function getDetailhotel($id) {
        $hotel      = Hotel::findOrFail($id);
        $imageslist = Listimageshotel::where('hotel_id', $id)->get();
        $typeroom   = DetailHotelTyperoom::where([['hotel_id', $id],['status', 0]])->get();

        //dd($typeroom); exit();
        return view("pages.detailhotel", compact('hotel','imageslist','typeroom'));
    }
    // public function getTyperoomByhotel($id){

    // }
    public function getBookingroom($idhotel, $idroom) {
        $hotel = Hotel::find($idhotel);
        $detail_room = DetailHotelTyperoom::find($idroom);
        return view("pages.booking-hotel", compact('hotel','detail_room')) ;
    }
    public function postBookingroom(){

        return view("pages.success_booking") ;
    }
    public function getFindroomdistrict($district_id) {

        $province           = Province::all();
        $hotel              = Hotel::all();
        $district           = District::findOrFail($district_id);

        $hotelByDistrict    = Hotel::where('district_id',$district_id)->where('status',1)->get();
        $service_hotel      = DetailHotelService::all();

        return view("pages.list-hotel-district", compact('hotelByDistrict', 'service_hotel', 'district', 'province', 'hotel' ));
    }
}
