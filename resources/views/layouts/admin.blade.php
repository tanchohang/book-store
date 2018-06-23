@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-dark text-primary">
                        {{--<img src="" alt="prifile pic here" class="card-img">--}}
                        <div class="row">
                            <h4 class="card-title col-md-10 m-auto">Admin Dashboard</h4>

                            <a href="{{url()->previous()}}" class="btn btn-outline-light ">Back</a>
                        </div>
                    </div>
                    <div class="card-body bg-light">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{route('books.create')}}">Add a Book</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('books.index')}}">All Books</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
<div class="col-md-8">
    @yield('adminContent')

</div>

        </div>

    </div>
@stop