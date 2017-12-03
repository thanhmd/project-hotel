<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typeroom extends Model
{
    protected $table = "type_room";
    public function detail_typeroom() {
        return $this->hasMany('App\DetailHotelTyperoom', 'typeroom_id', 'id');
    }
}
