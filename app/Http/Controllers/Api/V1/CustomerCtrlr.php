<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerCtrlr extends Controller
{
    //
    public function index(){
        return response()->json("Customers Master List");
    }

    public function view(){
        return response()->json("Customers Master List2");
    }
}
