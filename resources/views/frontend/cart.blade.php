@extends('layouts.app');
@section('content')
    <div class="container">
        @if(Session::has('cart'))

        <div class="row justify-content-center">
            <div class="card  col-md-12">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title d-inline-block ">Book Cart</h3>
                    <a href="" class="card-title btn btn-sm btn-danger d-inline-block float-right">Empty</a>
                </div>
                <div class="card-body">
                    <form action="{{route('checkout')}}">
                        @csrf

                        <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col"></th>

                        </tr>
                        </thead>
                        <tbody>

                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td><span>{{$product['item']->title}}</span></td>
                                    <td><input type="number" name="quantity" value="{{$product['qty']}}" min="1"></td>
                                    <td><span><strong>Rs.</strong>{{$product['item']->price}}</span></td>
                                    <td scope="col"><a href="{{route('removeCart',['id'=>$product['item']->id])}}" class="btn btn-sm btn-danger">Remove</a></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        <div class="card-footer">
                            <div class="">
                                <h5 class=""><strong>Total Price:Rs.</strong>{{$totalPrice}}</h5>
                                <button type="submit" class="btn btn-primary">Check Out</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @else
            <div class="alert alert-warning"><h4>No Items in Cart</h4></div>
        @endif



    </div>
@stop