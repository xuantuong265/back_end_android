<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{

    public function index(){

        $data = DB::table('tbl_orders')
                         ->orderBy('id', 'desc')
                         ->paginate(6);

        return view('layout.orders.index')->with([
            'data' => $data
        ]);

    }

    public function update($id){

       $orders = Orders::find($id);
       $orders->status = 1;
       $orders->save();

       session()->flash('success', "Bạn đã xác nhận đơn hàng thành công");
       return redirect('list-orders');

    }

    public function delete($id){

        $orders = Orders::find($id);
        $orders->delete();

        $detail = DB::table('tbl_detailorders')
                           ->where('id_orders', $id)
                           ->delete();

        session()->flash('success', "Bạn đã xóa đơn hàng thành công");
        return redirect('list-orders');

    }

}
