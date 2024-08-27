<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class customerController extends Controller
{
    public function showcustomer(){
        $customer=DB::table('customer')->get();
        return $customer;
    }
}
