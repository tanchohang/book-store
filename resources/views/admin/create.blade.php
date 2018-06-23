@extends('layouts.admin')

@section('adminContent')
<div class="justify-content-center">
    <div class="card">
    <div class="card-header">
        <h3 class="card-title">Add Book</h3>
    </div>
    <div class="card-body">
    <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <label for="title"></label>
        <input type="text" class="form-control" name="title" placeholder="Enter the title of the book">

        <label for="author"></label>
        <input type="text" class="form-control" name="author" placeholder="Enter the author of the book">

        <label for="coverImg"></label>
        <input type="file" class="form-control" name="coverImg">


        <label for="isbn"></label>
        <input type="text" class="form-control" name="isbn" placeholder="Enter the ISBN of the book">

        <label for="price"></label>
        <input type="text" class="form-control" name="price" placeholder="Enter the Price of the book">

        <label for="description"></label>
        <textarea class="form-control editor" name="description" rows="10" placeholder="Enter the description of the book"></textarea>

        <br>

        <input type="submit" class="btn btn-primary" value="Add a Book">
    </form>
    </div>
    </div>
</div>
@stop