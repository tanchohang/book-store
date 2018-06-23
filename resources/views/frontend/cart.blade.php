@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h3 class="card-title d-inline-block ">Book Cart</h3>
                        @if(Session::has('cart') && Cart::count()!==0)
                            <a href="{{route('destroyCart')}}" class="card-title btn btn-sm btn-danger d-inline-block float-right">Empty</a>
                        @endif
                    </div>
                    @if(Session::has('cart'))

                        <div class="card-body">

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
                                            <input class="quantity" type="number" name="quantity" data-id="{{$product->rowId}}" value="{{$product->qty}}" min="1">

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

                                    <a href="{{route('checkout')}}" class="btn btn-success {{!Cart::count()?"disabled":""}}">Check Out</a>
                                    <a href="/" class="btn btn-primary">Continue shopping</a>

                                </div>
                            </div>
                            </form>
                            @else
                                <div class="alert alert-warning"><h4>No Items in Cart</h4></div>
                        </div>
                </div>
            </div>

        </div>

        @endif



    </div>
@stop
