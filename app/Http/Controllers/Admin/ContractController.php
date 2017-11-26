<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contract;
class ContractController extends Controller
{
	//Danh sash các hợp đồng
    public function getList() {
    	$contract = Contract::all();
    	return view("admin.contract.list", compact('contract'));
    }
}
