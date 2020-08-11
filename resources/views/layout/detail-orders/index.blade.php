@extends('layout')

@section('content')

    <div class="main">
        <h3 style="text-align:center">Chi tiết đơn hàng</h3>
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá tiền</th>
                <th scope="col">Số lượng</th>
              </tr>
            </thead>
            <tbody>
                <?php
                    $stt = 0;
                    $image = "http://localhost/Laravel/clonetiki/public/image/";
                ?>
              @if (!empty($data))
                  @foreach ($data as $item)
                   <?php $stt++;
                   ?>
                    <tr>
                        <th scope="row">{{ $stt }}</th>
                        <td style="font-size: 13px">{{ $item->name_products }}</td>
                        <td>
                            <img style="width: 30px; height: 30px;" src="{{ URL::to( $image.$item->image) }}" alt="">
                        </td>
                        <td>{{ $item->amounts }}</td>
                        <td>{{ $item->price }}</td>
                        <td style="text-align:center">
                            <a href=" {{ URL::to('/delete-detail/'.$item->id. '/'.$item->id_orders) }} ">Delete</a>
                        </td>
                    </tr>
                  @endforeach
              @endif
            </tbody>
          </table>

          @if (Session::has('success'))
                {{Session::get('success')}}
           @endif

    </div>

@endsection
