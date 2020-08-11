@extends('layout')

@section('content')

    <div class="main">
        <h3 style="text-align:center">Danh sách sản phẩm</h3>
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Danh mục</th>
                <th scope="col" style="text-align:center">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php
                    $stt = 0;
                ?>
              @if (!empty($data))
                  @foreach ($data as $item)
                   <?php $stt++ ?>
                    <tr>
                        <th scope="row">{{ $stt }}</th>
                        <td><a href="{{  URL::to('/list-products/'.$item->id)}}">{{ $item->name }}</a></td>
                        <td style="text-align:center">
                            <a href=" {{ URL::to('/edit/'.$item->id) }} " class="btn btn-warning">Update</a>
                            <a href=" {{ URL::to('/delete/'.$item->id) }} " class="btn btn-danger">Delete</a>
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
