<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{

    protected $table = "hotel";
    // public $timestamps =false;

    public function province() {
    	return $this->belongsTo('App\Province', 'province_id', 'id');
    }
    public function district() {
    	return $this->belongsTo('App\District', 'district_id', 'id');
    }
    public function user() {
        return $this->belongsTo('App\User', 'id_owner', 'id');
    }
    public function images() {
    	return $this->hasMany('App\Listimageshotel', 'hotel_id', 'id');
    }
    public function service_detail() {
        return $this->hasMany('App\DetailHotelService', 'hotel_id', 'id');
    }
    public function typeroom_detail() {
        return $this->hasMany('App\DetailHotelTyperoom', 'hotel_id', 'id');
    }
    public function contract() {
        return $this->hasMany('App\Contract', 'hotel_id', 'id');
    }

    // public function list_image(){
    //     return $this->hasMany('App\Listimageshotel', 'hotel_id', 'id');
    // }
}
