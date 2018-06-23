@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h1>Contact</h1>
                <form action="{{route('contact')}}" method="POST">
                    @csrf
                    <label for="name">Name:</label><input type="text" name="name" class="form-control">
                    <label for="email">Email:</label><input type="email" name="email" class="form-control">
                    <label for="subject">Subject:</label><input type="text" name="subject" class="form-control">
                    <label for="message">Message:</label><textarea name="message" class="form-control editor" id="message" cols="30" rows="5"></textarea>
                    <br>
                    <input type="submit" value="submit" class="btn btn-primary btn-lg">


                </form>
            </div>
        </div>
    </div>

@endsection