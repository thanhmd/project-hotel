<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = "service";
    public function type_service() {
    	return $this->belongsTo('App\Typeservice', 'typeservice_id', 'id');
    }
    public function hotel_service() {
    	return $this->hasMany('App\DetailHotelService', 'service_id', 'id');
    }
}
