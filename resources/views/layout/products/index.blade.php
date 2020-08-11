@extends('layout')

@section('content')

    <div class="main">
        <h3 style="text-align:center">Danh sách sản phẩm</h3>
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá tiền</th>
                <th scope="col" style="text-align:center"><a href="{{  URL::to('/create-products/')}}">Thêm sản phẩm</a></th>
              </tr>
            </thead>
            <tbody>
                <?php
                    $stt = 0;

                ?>
              @if (!empty($data))
                  @foreach ($data as $item)
                   <?php $stt++;
                        $image = "http://localhost/blog/public/image/";
                   ?>
                    <tr>
                        <th scope="row">{{ $stt }}</th>
                        <td style="font-size: 13px;overflow: hidden; width: 400px">{{ $item->name }}</td>
                        <td>
                            <img style="width: 30px; height: 30px;" src="{{ URL::to( $image.$item->image) }}" alt="">
                        </td>
                        <td>{{ $item->amounts }}</td>
                        <td>{{ $item->price }}</td>
                        <td style="text-align:center">
                            <a href=" {{ URL::to('/edit-products/'.$item->id) }} " class="btn btn-warning">Update</a>
                            <a href=" {{ URL::to('/delete-products/'.$item->id.'/'.$item->id_brand) }} " class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                  @endforeach
              @endif
            </tbody>
          </table>

          {!! $data->links() !!}

          @if (Session::has('success'))
                {{Session::get('success')}}
           @endif

    </div>

@endsection
