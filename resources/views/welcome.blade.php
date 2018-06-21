@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Auth::check())
        <div class="row">
            <div class="col-md-12">
               <span class="badge badge-primary text-white font-weight-bold float-right mr-4">Welcome, {{Auth::user()->name}}</span>
            </div>
        </div>
        @endif
<div class="row m-auto">
    <div class="col-md-2">
        <div class="card h-25">
            <div class="card-header">
                <h4 class="card-title">Filters</h4>
            </div>
            <div class="card-body">
                <div class="border-info">

                </div>
            </div>
        </div>
    </div>

<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            <h3 class="">Book List</h3>
        </div>
        <div class="row card-body justify-content-center">
            @foreach($books as $book)
                <div class="card mb-2 m-1" style="width: 14rem;">
                    <img class="card-img-top" src="

                             {{($book->id>50)?asset('storage/uploads/'.$book->imgUrl):$book->imgUrl}}"

                         alt="{{$book->imgUrl}}" width="150" height="200">
                    <div class="card-body">
                        <h6 class="card-title"><strong>{{$book->title}}</strong></h6>
                        <span > {{$book->author}}</span>
                        <p class="card-text"></p>
                        <h6><span class="text-dark"><strong class="mr-2">Rs.{{$book->price}}</strong></span><span class="badge badge-danger">  20% Discount Offer</span></h6>
                        <a href="{{route('addToCart',['id'=>$book->id])}}" class="btn btn-primary btn-sm">Add to cart</a>
                        <a href="{{route('detail',['id'=>$book->id])}}" class="btn btn-info btn-sm">Details</a>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</div>

    <div class="col-md-2">
        <div class="card h-50">
            <div class="card-header">
                <h4 class="card-title">Aside</h4>
            </div>
            <div class="card-body">
                <div class="border-info">

                </div>
            </div>
        </div>
    </div>
</div>
        <div class=" row justify-content-center pagination-lg">{{ $books->links() }}</div>

    </div>
@stop