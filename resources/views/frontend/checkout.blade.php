@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Checkout</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{route('order')}}" method="POST" class="card-body">
                            @csrf

                            <input type="text" name="address" class="form-control" placeholder="Enter Your Address"><br>

                            <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone number"><br>

                            <button type="submit" class="btn btn-warning {{Auth::check()?'':'disabled'}}">Buy</button>

                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-light text-primary">
                        {{--<h3 class="card-title">Your Orders</h3>--}}
                        <h5>Total:Rs.{{Cart::subtotal()}}</h5>
                        <h5>Total Quantity:{{Cart::count()}}</h5>

                    </div>
                    <div class="card-body">
                        
                                    @foreach(Cart::content() as $cartItem)
                                        <div class="">
                                            <div class="d-inline-block">
                                                <img src="{{$cartItem->options['img']}}" alt="" width="100" height="150">
                                            </div>

                                            <span><strong>Title:</strong>{{$cartItem->name}}</span>
                                            <span class="text-warning"><strong>Rs.</strong>{{$cartItem->price}}</span>
                                            <span><strong>Quantity:</strong>{{$cartItem->qty}}</span>

                                        </div><br>

                                @endforeach

                        
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop