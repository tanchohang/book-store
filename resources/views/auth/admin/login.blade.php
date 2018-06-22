@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <h2 class="bg-light text-primary">Admin Login</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.login')}}" method="post">
                        @method('POST')
                        @csrf
                        <div class="form-group {{$errors->has('email')? "has-error":""}}">
                            <label for="email" class="{{$errors->has('email')? "text-danger":""}}"><i class="fa fa-envelope prefix grey-text"></i>
                            </label><br>
                            @foreach($errors->get('email') as $error)
                                <span class="text-danger">{{$error}}</span><br>
                            @endforeach
                            <input name="email" class="form-control" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group {{$errors->has('password')? "has-error":""}}">
                            <label for="password" class="{{$errors->has('password')? "text-danger":""}}"><i class="fa fa-lock prefix"></i></label><br>
                            @foreach($errors->get('password') as $error)
                                <span class="text-danger">{{$error}}</span><br>
                            @endforeach
                            <input type="password" name="password" class="form-control" placeholder="Enter Your Password">
                        </div>
                        <span><input type="checkbox" name="remember_token">Remember me?</span><br>

                        <button type="submit" class="btn btn-primary btn-block"> Sign In</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop