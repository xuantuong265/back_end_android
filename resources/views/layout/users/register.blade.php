@extends('layout')

@section('content')


    <div class="main" style="width: 500px; margin: 100px auto;">
        <ul class="list-group">
            <li class="list-group-item active">Register</li>
            <li class="list-group-item">
                <form action="{{ URL::to('register') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="text" id="exampleInputEmail1" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Confirm Password</label>
                        <input type="text" id="exampleInputEmail1" name="ConfirmPassword" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </li>
          </ul>
    </div>

@endsection
