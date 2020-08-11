@extends('layout')

@section('content')

    <div class="main" style="width: 500px; margin: 100px auto;">
        <ul class="list-group">
            <li class="list-group-item active">Thêm thông báo</li>
            <li class="list-group-item">
                <form action="{{ URL::to('store-notification') }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>Title: </label>
                      <input type="text" name="title" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nội dung: </label>
                        <input type="text" name="content" id="" class="form-control">
                      </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh:</label>
                        <input type="file" id="exampleInputEmail1" name="img">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </li>
          </ul>
    </div>

@endsection
