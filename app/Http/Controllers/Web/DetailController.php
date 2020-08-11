<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\DetailOrders;

class DetailController extends Controller
{

    public function index($id_orders){

        $data = DB::table('tbl_detailorders')
                         ->where('id_orders', $id_orders)
                         ->get();

        return view('layout.detail-orders.index')->with([
            'data'   => $data
        ]);

    }

    public function delete($id, $id_orders){

        $data = DetailOrders::find($id);
        $data->delete();

        session()->flash('success', "Bạn đã xóa sản phẩm thành công");
        return redirect('list-detail/'.$id_orders);

    }

}
