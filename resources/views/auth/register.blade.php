
@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 m-auto">
                <div class="card ">

                    <!-- Card Header -->
                    <div class="card-header bg-primary">
                        <h4 class="card-title text-white">Sign Up</h4>
                    </div>

                    <!-- Card body -->
                    <div class="card-body">
                        <form action="{{route('register')}}" method="POST">
                            @csrf
                            <div class="form-group {{$errors->has('name')?"has-error":""}}">
                                <label for="name" class="{{$errors->has('name')? "text-danger":""}}"> <i class="fa fa-user prefix grey-text"></i></label><br>

                                @foreach($errors->get('name') as $error)
                                    <span class="text-danger">{{$error}}</span><br>
                                @endforeach()
                                <input type="text" name="name" class="form-control" placeholder="Enter You Full Name">
                            </div>
                            <div class="form-group {{$errors->has('email')? "has-error":""}}">
                                <label for="email" class="{{$errors->has('email')? "text-danger":""}}"><i class="fa fa-envelope prefix grey-text"></i></label><br>
                                @foreach($errors->get('email') as $error)
                                    <span class="text-danger">{{$error}}</span><br>
                                @endforeach
                                <input name="email" class="form-control" placeholder="Enter you Email Address">
                            </div>
                            <div class="form-group {{$errors->has('password')? "has-error":""}}">
                                <label for="password" class="{{$errors->has('password')? "text-danger":""}}"><i class="fa fa-lock prefix"></i></label><br>
                                @foreach($errors->get('password') as $error)
                                    <span class="text-danger">{{$error}}</span><br>
                                @endforeach
                                <input type="password" name="password" class="form-control" placeholder="Enter Your Password">
                            </div>
                            <div class="form-group {{$errors->has('password_confirmation')? "has-error":""}}">
                                <label for="password" class="{{$errors->has('password_confirmation')? "text-danger":""}}"><i class="fa fa-lock prefix"></i></label><br>
                                @foreach($errors->get('password_confirmation') as $error)
                                    <span class="text-danger">{{$error}}</span><br>
                                @endforeach
                                <input type="password" name="password_confirmation" class="form-control" id="registerbtn" placeholder="Confirm Your Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                        </form>

                    </div>

                    <!-- Card footer -->
                    <div class="card-footer">
                        <span> Already have an account? Or Login with social media <a href="{{route('login')}}">Login</a></span>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
