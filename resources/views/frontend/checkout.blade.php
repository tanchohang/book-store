@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row card justify-content-center">
            <div class="card-header">
                <h1 class="card-title">Checkout</h1>
                <h4>Total:Rs.{{$total}}</h4>
            </div>
            <form action="{{route('order')}}" method="POST" class="card-body">
                @csrf

                <input type="text" name="address" class="form-control" placeholder="Enter Your Address"><br>

                <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone number"><br>
                <button type="submit" class="btn btn-warning ">Buy</button>
            </form>
        </div>
    </div>
@stop