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
}
