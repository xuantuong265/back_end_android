<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\comments;
use App\Model\Products;

class CommentController extends Controller
{
    public function insertComment(Request $request){

        $data = array();
        $data['id_user'] = $request->id_user;
        $data['id_products'] = $request->id_products;
        $data['content'] = $request->content;

        $img = $request->image;

        if ( $img != null ) {
            $foder = "../public/image/";

            // set name
            $name = "/". rand() . "_" . time() . ".png";

            // đường dẫn đầy đủ
            $foder = $foder.$name;

            file_put_contents($foder, base64_decode($img));
        }else {
            $name = "";
        }


        $data['img'] = $name;
        $data['star'] = $request->star;
        $data['date'] = $request->date;

       DB::table('tbl_comment')->insert($data);

        //update star cho sản phẩm
        $products = DB::table('tbl_comment')->where('id_products', $request->id_products)->get();

        $star = 0;
        $average = 0;
        $count = 0;

        foreach ($products as $value) {
            $star += $value->star;
            $count++;
        }

        // sao trung bình
        $average = ( $star / $count );

        DB::table('tbl_products')->where("id", $request->id_products)->update(['star' => $average]);



        return response([
            'status' => true,
        ]);

    }


    public function getComment(Request $request){


        $data = DB::table('tbl_comment')
            ->join('users', 'users.id', '=', 'tbl_comment.id_user')
            ->select('tbl_comment.*', 'users.email')
            ->where('tbl_comment.id_products', $request->id_products)
            ->get();

        return response([
            'data' => $data
        ]);

    }

    public function yourComment(Request $request){

        $data = DB::table('tbl_comment')
                         ->join('tbl_products', 'tbl_products.id', '=', 'tbl_comment.id_products')
                         ->select('tbl_comment.*', 'tbl_products.name', 'tbl_products.image')
                         ->where('id_user', $request->id_user)
                         ->get();

        if ($data) {
            return json_decode($data);
        }

    }

}
