<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Service;
use App\DetailHotelService;

class HotelServiceController extends Controller
{
    public function getList($idhotel) {
        $hotel = Hotel::find($idhotel);
        $hotel_services = $hotel->service_detail()->get();
        return view("unithotel.hotel.service.list", ['hotel' => $hotel, 'hotel_services' => $hotel_services]);
    }

    public function getDelete($idhotel, $idservice) {
        $hotel_service = DetailHotelService::find($idservice);
        $hotel_service -> delete();
        return redirect('unithotel/hotel/' .  $idhotel . '/detail/service/list')->with('thongbao', 'xóa thành công');
    }

    public function getAdd($idhotel)
    {
        $hotel = Hotel::find($idhotel);
        $services = Service::all();
        return view('unithotel.hotel.service.add', ['hotel' => $hotel, 'services' => $services]);
    }

    public function postAdd(Request $req, $idhotel)
    {
        $this->validate($req,
            [
                "service"             => "required",
                "name"             => "required",
                "price"            => "required"
            ],
            [
                "service.required"        => "Bạn chưa chọn loại dịch vụ ",
                "name.required"            => "Bạn chưa nhập tên dịch vụ ",
                "price.required"            => "Bạn chưa nhập giá dịch vụ"
            ]);
        $hotel_service              = new DetailHotelService;
        $hotel_service->name        = $req->name;
        $hotel_service->service_id = $req->service;
        $hotel_service->price       = $req->price;
        $hotel_service->hotel_id      = $idhotel;
        $hotel_service->save();
        return redirect('unithotel/hotel/' .  $idhotel . '/detail/service/list')->with("thongbao", "Thêm thành công ! ");
    }

    public function getEdit($idhotel, $idservice)
    {
        $hotel_service = DetailHotelService::find($idservice);
        $services = Service::all();
        return view('unithotel.hotel.service.edit', ['hotel_service' => $hotel_service, 'services' => $services]);
    }

    public function postEdit(Request $req, $idhotel, $idservice)
    {
        $this->validate($req, [
                'name'  => 'required',
                'service'=> 'required',
                'price'=>'required',
            ],
            [
                'name.required' => 'Bạn chưa nhập tên dịch vụ',
                'service.required' => 'Bạn chưa chọn loại dịch vụ',
                'price.required'=> "Bạn chưa nhập giá dịch vụ"
            ]);
        $hotel_service = DetailHotelService::find($idservice);
        $hotel_service->name = $req->name;
        $hotel_service->service_id   = $req->service;
        $hotel_service->price = $req->price;
        $hotel_service->save();
        return redirect('unithotel/hotel/' .  $hotel_service->hotel_id . '/detail/service/list')->with('thongbao', 'Sửa thành công');
    }
}
