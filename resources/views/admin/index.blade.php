@extends('layouts.admin')

@section('adminContent')
<div class="container">
    <div class="row justify-content-center">
            @foreach($books as $book)
                <div class="card mb-2 m-1" style="width: 14rem;">
                    <img class="card-img-top" src=" {{($book->id>50)?asset('storage/uploads/'.$book->imgUrl):$book->imgUrl}}" width="150" height="200">
                    <div class="card-body">
                        <h6 class="card-title"><strong>{{$book->title}}</strong></h6>
                        <span > {{$book->author}}</span>
                        <p class="card-text"></p>
                        <h6><span class="text-dark"><strong class="mr-2">Rs.{{$book->price}}</strong></span><span class="badge badge-danger">  20% Discount Offer</span></h6>
                        <a href="{{route('books.edit',['id'=>$book->id])}}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{route('books.show',['id'=>$book->id])}}" class="btn btn-sm btn-info">Detail</a>
                        <form action="{{route('books.destroy',['id'=>$book->id])}}" method="GET">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>

                    </div>
                </div>
            @endforeach

    </div>

    <div class=" row justify-content-center pagination-lg">{{ $books->links() }}</div>

</div>
@stop