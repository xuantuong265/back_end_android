<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{

    public function getBrand(){
       $data = DB::table('tbl_brand')->get();
       return $data;
    }

}
