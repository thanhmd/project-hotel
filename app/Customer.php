<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $table = "users";
    public function hotel() {
    	return $this->hasMany('App\Hotel', 'id_owner', 'id');
    }
}
