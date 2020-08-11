@extends('layout')

@section('content')

    <div class="main">
        <h3 style="text-align:center">Danh sách thông báo</h3>
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên thông báo</th>
                <th scope="col">Thời gian</th>
                <th scope="col">Chức năng</th>
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
                        <td style="font-size: 13px">{{ $item->title }}</td>
                        <td style="font-size: 13px">{{ $item->date }}</td>
                        <td style="font-size: 13px">
                            <a href="">Update</a> ||
                            <a href="">Delete</a>
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
