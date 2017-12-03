<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailHotelTyperoom extends Model
{
    //
    protected $table = "detail_hotel_typeroom";
    public function hotel() {
    	return $this->belongsTo('App\Hotel', 'hotel_id', 'id');
    }
    public function type_room() {
    	return $this->belongsTo('App\Typeroom', 'typeroom_id', 'id');
    }
}
