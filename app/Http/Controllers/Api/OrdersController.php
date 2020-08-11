<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Orders;
use App\Model\Products;
use App\Model\DetailOrders;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function insert(Request $request){

        // thêm hóa đơn
        $orders = new Orders;
        $orders->id_user = $request->id_user;
        $orders->name = $request->name;
        $orders->address = $request->address;
        $orders->phone = $request->phone;
        $orders->total = $request->total;
        $orders->status = $request->status;
        $orders->date = $request->date;

        $orders->save();



        return response([
            'status' => true,
            'orders'  => $orders
        ]);

    }

    public function insertDetailOrders(Request $request){

        // thêm chi tiết hóa đơn

       $mang = $request->mang;
       $json = json_decode($mang, true);


        foreach( $json as $value ){
            $datas = new DetailOrders;
            $datas->id_orders = $value['id_orders'];
            $datas->id_products = $value['id_products'];
            $datas->name_products = $value['name_products'];
            $datas->image = $value['image'];
            $datas->price = $value['price'];
            $datas->amounts = $value['amounts'];

            $datas->save();

            // update lại số lượng trong bản sản phẩm
            $products = Products::find($value['id_products']);
            $soluong = $products->amounts;
            $amounts = $soluong - $value['amounts'];
            $products->amounts = $amounts;
            $products->update();


        }

        return response([
            'status' => true,
            'data'  => $datas
        ]);


    }


    public function getOrder(Request $request){

        $datas = DB::table('tbl_orders')->where('id_user', $request->id_user)
                                        ->where('status', 0)->get();

        if( $datas ){
            return json_decode($datas);
        }

    }

    public function getOrderSuccess(Request $request){

        $datas = DB::table('tbl_orders')->where('id_user', $request->id_user)
        ->where('status', 1)->get();

        if( $datas ){
             return json_decode($datas);
        }

    }

   public function getOrderDetail(Request $request){

       $datas = DB::table('tbl_detailorders')->where('id_orders', $request->id_orders)->get();
       if( $datas ){
            return json_decode($datas);
       }

   }

   public function delete(Request $request){

        $orders = DB::table('tbl_orders')
                           ->where('id', $request->id)
                           ->delete();

        $detail = DB::table('tbl_detailorders')
                        ->where('id_orders', $request->id)
                        ->delete();

        return response([
            'status' => true
        ]);


   }


}
