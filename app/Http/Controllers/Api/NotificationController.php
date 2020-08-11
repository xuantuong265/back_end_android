<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{

    public function index(Request $request){

        $data = DB::table('tbl_notification')
                         ->orderBy('id', 'desc')
                         ->get();

        return json_decode($data);

    }


}
