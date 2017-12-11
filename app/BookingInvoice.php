<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingInvoice extends Model
{
    protected $table = "booking_invoice";

    // public function admin() {
    // 	return $this->belongsTo('App\Admin', 'IDAdmin', 'id');
    // }
    public function detail_room() {
    	return $this->belongsTo('App\DetailHotelTyperoom', 'IDDetailHotelTypeRoom', 'id');
    }
}
