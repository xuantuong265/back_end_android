<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Brands;
use App\Model\Categories;
use App\Model\Products;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $data = DB::table('tbl_brand')->paginate(6);
        return view('layout.brands.index')->with([
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('layout.brands.create');
    }

    public function store(Request $request)
    {

        $data = array();
        $data['name'] = $request->name;
        // xử lý hình ảnh
        if ($request->hasFile('img')) {
            $foder = "../public/image/";
            $target_file = $foder.basename($_FILES['img']['name']);
            // upload file
            move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
            $img = $_FILES['img']['name'];

        }
        $data['image'] = $img;
        DB::table('tbl_brand')->insert($data);
        return redirect('/');
    }

    public function edit($id)
    {
        $brand = DB::table('tbl_brand')->where('id', $id)->get();
        return view('layout.brands.edit')->with([
            'brand' => $brand
        ]);
    }

    public function update($id, Request $request)
    {

        $data = array();
        $data['name'] = $request->name;
        // xử lý hình ảnh
        if ($request->hasFile('img')) {
            $foder = "../public/image/";
            $target_file = $foder.basename($_FILES['img']['name']);
            // upload file
            move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
            $img = $_FILES['img']['name'];

        }
        $data['image'] = $img;
        DB::table('tbl_brand')->where('id', $id)->update($data);
        $request->session()->flash('success', "Bạn đã sửa danh mục thành công");

        return redirect( Route('index') );

    }

    public function delete($id)
    {
        $brand = Brands::find($id);
        $brand->delete();
        session()->flash('success', "Bạn đã xóa danh mục thành công");

        return redirect( '/');
    }

}
