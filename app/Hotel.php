<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = "hotel";
    public function province() {
    	return $this->belongsTo('App\Province', 'province_id', 'id');
    }
    public function district() {
    	return $this->belongsTo('App\District', 'district_id', 'id');
    }
}
