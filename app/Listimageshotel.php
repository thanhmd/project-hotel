<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listimageshotel extends Model
{
    protected $table = "hotel_imagelist";
    public function hotel() {
    	return $this->belongsTo('App\Hotel', 'hotel_id', 'id');
    }
}
