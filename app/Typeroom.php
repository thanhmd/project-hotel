<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typeroom extends Model
{
    protected $table = "type_room";
    public function room() {
    	return $this->hasMany('App\Room', 'typeroom_id', 'id');
    }
}
