<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = "room";
    public function type_room() {
    	return $this->belongsTo('App\Typeroom', 'typeroom_id', 'id');
    }
    public function room_detail() {
        return $this->hasMany('App\DetailHotelRoom', 'room_id', 'id');
    }
}
