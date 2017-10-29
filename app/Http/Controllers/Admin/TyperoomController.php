<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Typeroom;
class TyperoomController extends Controller
{
    public function getList() {
        $typeroom = Typeroom::all();
        return view("admin.type_room.list", ["typeroom" => $typeroom]);
    }
}
