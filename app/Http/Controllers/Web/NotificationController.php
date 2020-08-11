<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{

    public function index(){

        $data = DB::table('tbl_notification')->paginate(6);

        return view('layout.notification.index')->with([
            'data' => $data
        ]);

    }

    public function create(){

        return view('layout.notification.create');

    }

    public function store(Request $request){

        $data = array();
        $data['title'] = $request->title;
        $data['content'] = $request->content;

         // xử lý hình ảnh
         if ($request->hasFile('img')) {
            $foder = "../public/image/";
            $target_file = $foder.basename($_FILES['img']['name']);
            // upload file
            move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
            $img = $_FILES['img']['name'];



        }
        $data['img'] = $img;

        $date = date_create();
        $date = date_format($date, 'H:i:s d-m-Y ');
        $data['date'] = $date;

         DB::table('tbl_notification')->insert($data);

         $request->session()->flash('success', "Bạn đã sửa sản phẩm thành công");

         return redirect('list-notification');

    }

}
