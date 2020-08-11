<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\DaXem;

class ProductController extends Controller
{
    public function mobileProduct(){
        $data = DB::table('tbl_products')->where('id_categories', 1)->get();

        return json_decode($data);
    }


    public function getProBrand(Request $request){

        $data = DB::table('tbl_products')->where("id_brand", $request->id_brand)->get();
        return json_decode($data);

    }

    public function getProduct(){
        $data = DB::table('tbl_products')->get();
        return json_decode($data);
    }

    public function updateProduct(Request $request){

         DB::table('tbl_products')->where("id", $request->id)->update(['star' => $request->star]);

        $data = DB::table('tbl_products')->where("id", $request->id)->get();

         return json_decode($data);

    }

    public function computerProduct(){

        $data =DB::table('tbl_products')->where('id_categories', 2)->get();

        return json_decode($data);

    }

    public function getProCate(Request $request){

        $data = DB::table('tbl_products')->where('id_categories', $request->id_categories)->get();

        if ($data) {
            return json_decode($data);
        }

    }

    public function countComment(Request $request){

        $data = DB::table('tbl_comment')->where('id_products', $request->id_products)->get();

        $count  = $data->count();

        // get star trong bảng sản phẩm
        $star = DB::table('tbl_products')->select('star')->where('id', $request->id_products)->get();



        return response([
            'status' => true,
            'count'  => $count,
            'star'   => $star
        ]);

    }

    public function search(Request $request){

        $name_products = $request->name_products;
        $data = "";
        if (!empty($name_products)) {
            $data  = DB::table('tbl_products')
            ->where('name','like', '%'.$name_products.'%')
            ->get();

        }
            return response([
                'status' => true,
                'data'  => $data
            ]);


    }

    // sản phẩm đã xem
    public function daXem(Request $request){

       // kiểm tra xem sản phẩm thêm vào có trùng với ở trong csdl không
        // lấy data từ csdl ra

        $daxem = DB::table('tbl_daxem')->where('id_users', $request->id_users)->get();
        $daxem = json_decode($daxem, true);

        $isCheckPro = false;
        $isCheckUsers = false;
        $dem = 0;

       foreach ($daxem as $value) {

            if ( $request->id_products == $value['id_products'] ) {
                $isCheckPro = true;
            }

       }


        if ( $isCheckPro == false ) {
            $data = new DaXem;
            $data->id_users = $request->id_users;
            $data->id_products = $request->id_products;

            $data->save();
        }


    }

    public function getSanPhamDaXem(Request $request){

        $data = DB::table('tbl_daxem')
                         ->join('tbl_products', 'tbl_products.id', '=', 'tbl_daxem.id_products')
                         ->select('tbl_products.*')
                         ->where('id_users', $request->id_users)
                         ->orderBy('id', 'desc')
                         ->get();

        return json_decode($data);

    }

}
