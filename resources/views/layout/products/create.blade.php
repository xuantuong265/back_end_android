@extends('layout')

@section('content')


    <div class="main" style="width: 500px; margin: 100px auto;">
        <ul class="list-group">
            <li class="list-group-item active">Thêm danh mục</li>
            <li class="list-group-item">
                <form action="{{ URL::to('store-products') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>Tên sản phẩm</label>
                      <input type="text" name="product_name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh:</label>
                        <input type="file" id="exampleInputEmail1" name="img">
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="text" name="amount" id="" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Giá</label>
                        <input type="text" name="price" id="" class="form-control">
                      </div>
                      <div class="form-group">Mô tả:</label>
                        <textarea name="products_desc" class="form-control" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Thương hiệu:</label>
                        <select class="form-control m-bot15" name="brand">
                             @foreach ($brand as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Danh mục:</label>
                        <select class="form-control m-bot15" name="categories">
                             @foreach ($categories as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </li>
          </ul>
    </div>

@endsection
