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
    public function room_detail() {
        return $this->hasMany('App\DetailHotelRoom', 'hotel_id', 'id');
    }


    public function typeroom() {
        return $this->belongsToMany('App\Typeroom', 'detail_hotel_typeroom', 'hotel_id', 'typeroom_id');
    }

    // public function list_image(){
    //     return $this->hasMany('App\Listimageshotel', 'hotel_id', 'id');
    // }
}