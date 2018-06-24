@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h5 class="border-bottom">Search Results</h5>
            <ul class="list-group">
                @foreach ($books as $book)

                <li class="list-group-item">
                    {{ $book->title}}
                    {{ $book->author}}<br>


                </li>

                @endforeach

            </ul>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-8 m-auto">
            {{ $books->links() }}

        </div>
    </div>

    @endsection