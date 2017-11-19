<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailHotelRoom extends Model
{
    protected $table = "detail_hotel_room";
    public function hotel() {
    	return $this->belongsTo('App\Hotel', 'hotel_id', 'id');
    }
    public function room() {
    	return $this->belongsTo('App\Room', 'room_id', 'id');
    }
}
