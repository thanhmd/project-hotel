<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = "service";
    public function type_service() {
    	return $this->belongsTo('App\Typeservice', 'typeservice_id', 'id');
    }
}
