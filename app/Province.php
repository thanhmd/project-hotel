<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = "province";
    public function district() {
    	return $this->hasMany('App\District', 'province_id', 'id');
    }
    public function hotel() {
    	return $this->hasMany('App\Hotel', 'province_id', 'id');
    }
}
