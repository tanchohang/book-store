@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">

                <!-- card Header -->
                <div class="card-header bg-primary">
                    <h4 class="card-title text-white">Sign In</h4>
                </div>

                <!-- card body -->
                <div class="card-body row">

                    <div class="col-md-6 border-right">
                        <h2 class="badge-primary">Login with Social</h2>
                        <br>
                        <a href="{{url('login/facebook')}}" class="btn btn-primary btn-lg form-control d-block"><i class="fa fa-facebook-f"></i> Login With Facebook</a><br>
                        <a href="" class="btn btn-danger btn-lg form-control d-block"><i class="fa fa-google-plus"></i> Login With Google</a><br>
                        <a href="{{url('login/twitter')}}" class="btn btn-info btn-lg form-control d-block"><i class="fa fa-twitter"></i>Login With Twitter</a>

                    </div>


                    <div class="col-md-6">
                        <h2 class="badge-primary">Login with Email</h2>

                        <form action="{{route('login')}}" method="post">
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

                <!-- Card footer -->
                <div class="card-footer">
                    <span class="float-right">Don't have an account? <a href="{{route('register')}}">Sign Up</a></span>
                </div>



            </div>
        </div>

    </div>
</div>

    @stop