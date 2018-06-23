@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="card  col-md-12">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title d-inline-block ">Book Cart</h3>
                    <a href="{{route('destroyCart')}}" class="card-title btn btn-sm btn-danger d-inline-block float-right">Empty</a>
                </div>
                @if(Session::has('cart'))

                <div class="card-body">
                    <form action="{{route('checkout')}}">
                        @method('PUT')
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

                            @foreach(Cart::content() as $product)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td><span>{{$product->name}}</span></td>
                                    <td>
                                        {{--<input class="quantity" type="number" name="quantity" data-id="{{$product->rowId}}" value="{{$product->qty}}" min="1">--}}
                                        <select class="quantity" data-id="{{ $product->rowId }}">
                                            @for ($i = 1; $i < 5 + 1 ; $i++)
                                                <option {{ $product->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td><span><strong>Rs.</strong>{{$product->price}}</span></td>
                                    <td scope="col"><a href="{{route('removeFromCart',['id'=>$product->rowId])}}" class="btn btn-sm btn-danger">Remove</a></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        <div class="card-footer">
                            <div class="">
                                <h5 class=""><strong>Total Quantity:</strong>{{Cart::count()}}</h5>

                                <h5 class=""><strong>Total Price:Rs.</strong>{{Cart::subtotal()}}</h5>
                                <button type="submit" class="btn btn-primary">Check Out</button>
                            </div>
                        </div>
                    </form>
                    @else
                        <div class="alert alert-warning"><h4>No Items in Cart</h4></div>
                </div>
            </div>
        </div>

        @endif



    </div>
@stop
