<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{

    public function index(){

        $data = DB::table('users')->get();

        return view('layout.users.index')->with([
            'data' => $data
        ]);

    }

    public function delete($id){

        $data = User::find($id);
        $data->delete();

        session()->flash('success', "Bạn đã xóa sản phẩm users thành công");
        return redirect( 'list-users' );

    }

    public function formLogin(){
        return view('layout.users.login');
    }

    public function register(Request $request){

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $users = User::create($data);

        $accessToken = $users->createToken('authToken')->accessToken;

        session()->flash('success', "Đăng ký thành công");
        return redirect( '/' );

    }

    public function formRegister(){
        return view('layout.users.register');
    }

    public function login(Request $request){

        $data = DB::table('users')->where('email', $request->email)
        ->where('password', $request->password)->first();

        if ($data){
            $request->session()->put('admin_name', $data->email);
            return redirect( '/' );
        }else {
            return redirect()->back();
        }



    }

    public function logout(){

    }

}
