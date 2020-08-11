<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\users;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request){

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

      //   $users = User::create($data);

      //   $accessToken = $users->createToken('authToken')->accessToken;

      $users = new User;
      $users->email = $request->email;
      $users->password = $request->password;
      $users->save();



        return response([
            'status' => true,
            'users'  => $users
        ]);
    }

    public function login (Request $request){

        $data = DB::table('users')->where('email', $request->email)
        ->where('password', $request->password)->first();

            if ($data){
                return response()->json([
                "status" => true,
                "data"   => $data
             ]);
            }else{
                return response()->json([
                    "status" => false,
                 ]);
            }


    }

}
