<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailHotelService extends Model
{
    protected $table = "detail_hotel_service";
    public function hotel() {
    	return $this->belongsTo('App\Hotel', 'hotel_id', 'id');
    }
    public function service() {
    	return $this->belongsTo('App\Service', 'service_id', 'id');
    }
}
