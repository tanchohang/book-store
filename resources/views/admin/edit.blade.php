@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row card justify-content-center">
            <div class="card-header">
                <h3 class="card-title">Add Book</h3>
            </div>
            <div class="card-body">
                <form action="{{route('books.update',['id'=>$book->id])}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <label for="title"></label>
                    <input type="text" class="form-control" name="title" value="{{$book->title}}">

                    <label for="author"></label>
                    <input type="text" class="form-control" name="author" value="{{$book->author}}">

                    <label for="coverImg"></label>
                    <img src="{{($book->id>50)?asset('storage/uploads/'.$book->imgUrl):$book->imgUrl}}" class="float-left" width="50" height="100">
                    <input type="file" class="form-control" name="coverImg">


                    <label for="isbn"></label>
                    <input type="text" class="form-control" name="isbn" value="{{$book->isbn}}">

                    <label for="price"></label>
                    <input type="text" class="form-control" name="price" value="{{$book->price}}">

                    <label for="description"></label>
                    <textarea class="form-control" name="description" cols="7">{{$book->description}}</textarea>

                    <br>

                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
            </div>
        </div>
    </div>
@stop