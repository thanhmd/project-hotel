<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = "district";
    
    public function province() {
    	return $this->belongsTo('App\Province', 'province_id', 'id');
    }
    public function hotel() {
    	return $this->hasMany('App\Hotel', 'district_id', 'id');
    }
}
