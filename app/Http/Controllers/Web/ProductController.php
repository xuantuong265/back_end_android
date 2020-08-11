<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index($id)
    {
        $data = DB::table('tbl_products')->where('id_brand', $id)->paginate(6);
        return view('layout.products.index')->with([
            'data' => $data
        ]);
    }


    public function create(){

        $brand = DB::table('tbl_brand')->get();
        $categories = DB::table('tbl_categories')->get();

        return view('layout.products.create')->with([
            'brand'  => $brand,
            'categories' => $categories
        ]);
    }

    public function store(Request $request){

        $data = array();
        $data['id_brand'] = $request->brand;
        $data['id_categories'] = $request->categories;
        $data['name'] = $request->product_name;
        $data['price'] = $request->price;
        $data['amounts'] = $request->amount;
        $data['products_desc'] = $request->products_desc;
        $data['star'] = 0;



        // xử lý hình ảnh
        if ($request->hasFile('img')) {
            $foder = "../public/image/";
            $target_file = $foder.basename($_FILES['img']['name']);
            // upload file
            move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
            $img = $_FILES['img']['name'];

            $data['image'] = $img;

        }



         DB::table('tbl_products')->insert($data);

         return redirect('list-products/'.$request->brand);


    }

    public function edit($id)
    {
        $products = DB::table('tbl_products')->where('id', $id)->get();
        $brand = DB::table('tbl_brand')->get();
        $categories = DB::table('tbl_categories')->get();
        return view('layout.products.edit')->with([
            'products' => $products,
            'brand'    => $brand,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id){

        $data = array();
        $data['id_brand'] = $request->brand;
        $data['id_categories'] = $request->categories;
        $data['name'] = $request->product_name;
        $data['price'] = $request->price;
        $data['amounts'] = $request->amount;
        $data['products_desc'] = $request->products_desc;
        // xử lý hình ảnh
        if ($request->hasFile('img')) {
            $foder = "../public/image/";
            $target_file = $foder.basename($_FILES['img']['name']);
            // upload file
            move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
            $img = $_FILES['img']['name'];

        }
        $data['image'] = $img;
        DB::table('tbl_products')->where('id', $id)->update($data);
        $request->session()->flash('success', "Bạn đã sửa sản phẩm thành công");

        return redirect('list-products/'.$request->brand);


    }

    public function delete($id, $id_brand)
    {
        $products = Products::find($id);
        $products->delete();
        session()->flash('success', "Bạn đã xóa sản phẩm thành công");

        return redirect( 'list-products/'.$id_brand );
    }

}
