@extends('layout')

@section('content')

    <div class="main">
        <h3 style="text-align:center">Danh sách khách hàng</h3>
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tài khoản</th>
                <th scope="col" style="text-align: center">Xóa</th>
              </tr>
            </thead>
            <tbody>
                <?php
                    $stt = 0;
                ?>
              @if (!empty($data))
                  @foreach ($data as $item)
                   <?php $stt++;
                   ?>
                    <tr>
                        <th scope="row">{{ $stt }}</th>
                        <td>{{ $item->email }}</td>
                        <td style="text-align:center">
                            <a href=" {{ URL::to('/delete-users/'.$item->id) }} ">Delete</a>
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
