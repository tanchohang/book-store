@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h1>Contact</h1>
                <form action="{{route('contact')}}" method="POST" id="contactForm">
                    @csrf
                    <div class="form-group {{$errors->has('name')? "has-error":""}}">
                        <label for="name">Name:</label><br>
                        @foreach($errors->get('name') as $error)
                            <span class="text-danger">{{$error}}</span><br>
                        @endforeach
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="form-group {{$errors->has('email')? "has-error":""}}">
                        <label for="email">Email:</label><br>
                        @foreach($errors->get('email') as $error)
                            <span class="text-danger">{{$error}}</span><br>
                        @endforeach
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="form-group {{$errors->has('subject')? "has-error":""}}">
                        <label for="subject">Subject:</label><br>
                        @foreach($errors->get('subject') as $error)
                            <span class="text-danger">{{$error}}</span><br>
                        @endforeach
                        <input type="text" name="subject" class="form-control">
                    </div>

                    <div class="form-group {{$errors->has('message')? "has-error":""}}">
                        <label for="message">Message:</label><br>
                        @foreach($errors->get('message') as $error)
                            <span class="text-danger">{{$error}}</span><br>
                        @endforeach
                        <textarea name="message" class="form-control editor" id="message" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group {{$errors->has('g-recaptcha-response')? "has-error":""}}">
                        @foreach($errors->get('g-recaptcha-response') as $error)
                            <span class="text-danger">{{$error}}</span><br>
                        @endforeach
                        @captcha()
                    </div>
                    <br>

                    <input type="submit" value="submit" class="btn btn-primary btn-lg">


                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')

    {{--<script>--}}

        {{--$('#contactForm').submit(function () {--}}
            {{--var name=$("[name=g-recaptcha-response]").val();--}}
        {{--})--}}
    {{--</script>--}}

@endsection