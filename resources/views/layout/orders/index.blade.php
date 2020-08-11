@extends('layout')

@section('content')

    <div class="main">
        <h3 style="text-align:center">Danh sách đơn hàng</h3>
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Ngày mua</th>
                <th scope="col">Xóa</th>
              </tr>
            </thead>
            <tbody>
                <?php
                    $stt = 0;

                ?>
              @if (!empty($data))
                  @foreach ($data as $item)
                   <?php
                         $stt++;
                   ?>
                    <tr>
                        <th scope="row">{{ $stt }}</th>
                        <td style="font-size: 13px"><a href="{{ URL::to('list-detail/'.$item->id) }}">{{ $item->name }}</a></td>
                        <td style="font-size: 13px">{{ $item->address }}</td>
                        <td style="font-size: 13px">{{ $item->phone }}</td>
                        <td style="font-size: 13px">{{ $item->total }}</td>
                        <td style="font-size: 13px">
                            @if ( $item->status == 1 )
                                <p>Đã xác nhận</p>
                            @else
                                <a href=" {{ URL::to('update-orders/'.$item->id) }} ">Xác nhận</a>
                            @endif
                        </td>
                        <td style="font-size: 13px"> {{ $item->date }} </td>
                        <td style="font-size: 13px">
                            <a href=" {{ URL::to('/delete-orders/'.$item->id) }} ">Delete</a>
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
