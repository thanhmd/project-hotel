<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typeservice extends Model
{
    protected $table = "type_service";
    public function service() {
    	return $this->hasMany('App\Service', 'typeservice_id', 'id');
    }
}
