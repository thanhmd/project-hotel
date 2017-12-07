<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contract;
use App\Hotel;
use App\Customer;
class ContractController extends Controller
{
	//Danh sash các hợp đồng
    public function getList() {
    	$contract = Contract::all();
    	return view("admin.contract.list", compact('contract'));
    }
    public function getAdd() {
    	$hotels  = Hotel::all();
      $customers = Customer::all();
    	return view("admin.contract.add", compact('customers', 'hotels'));
    }
    public function postAdd(Request $req) {
      $this->validate($req,
            [
                "contract_name"                 => "required|min:3|max:32",
                "date_effective"                => "required",
                "out_date_effective"            => "required",
                "hotel"                         => "required",
                "owner"                         => "required",
            ],
            [
            	"contract_name.required"        => "Bạn chưa nhập tên hợp đồng ",
              "hotel"                         => "Bạn chưa chọn khách sạn",
              "owner"                         => "Bạn chưa chọn người đại diện",
              "date_effective"                => "Bạn chưa nhập ngày hiệu lực",
              "out_date_effective"            => "Bạn chưa nhập ngày hết hiệu lực",
            ]);
       $contract = new Contract;
       $contract -> name                  = $req -> contract_name;
       $contract -> hotel_id              = $req -> hotel;
       $contract -> date_effective        = $req -> date_effective;
       $contract -> out_date_effective    = $req -> out_date_effective;
       $contract -> id_owner              = $req -> owner;
       //status ...
       $contract -> save();
    }
}
