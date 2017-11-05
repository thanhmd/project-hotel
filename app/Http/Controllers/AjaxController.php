<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
class AjaxController extends Controller
{
    public function getDistrict($province_id){
    	$district = District::where('province_id', $province_id)->get();
    	foreach ($district as $dt) {
    		echo "<option value='".$dt->id."'>".$dt->name."</option>";
    	}
    }
}
