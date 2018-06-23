@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="users">
                        <div id="profileImg" class="text-center">
                            <img src="{{asset('storage/uploads/book-cover-1529462061.jpg')}}" alt="" class="rounded-circle" width="100" height="100">

                        </div>
                        <div id="profile" class="text-center text-primary">
                            <span>{{$user->name}}</span><br>
                            <span>{{$user->email}}</span>
                        </div>

                    </div>
                </div>


                <div id="orders" class="">



                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                                @foreach($orders as $order)
                                   <div class="card">
                                       <span class="card-header  badge badge-pill">Order Id  {{$order->id}}//{{$order->created_at}}</span>
                                       <div class="card-body">
                                           <ul class="list-group">

                                                   @foreach($order->cart as $items)
                                                       @foreach($items as $item)
                                                           <li class="list-group-item">
                                                               <span class="bagde badge-light">{{$item->name}}</span>
                                                               <span class="badge badge-warning">{{$item->qty}} Units</span>
                                                               <span class="badge badge-dark float-right">Rs.{{$item->price}}</span>
                                                           </li>
                                                        @endforeach
                                                   @endforeach

                                           </ul>
                                       </div>
                                       <div class="card-footer">
                                           <div class="row">
                                               <div class="col-md-6">
                                                   <strong>Phone: <span class="badge badge-info">{{$order->phone}}</span></strong><br>
                                                   <strong>Address: <span class="badge badge-info">{{$order->address}}</span></strong><br>
                                               </div>
                                               {{--<div class="col-md-6">--}}
                                                   {{--<strong>Total Price: Rs. <span class="badge badge-info">{{$totalPrice}}</span></strong><br>--}}
                                                   {{--<strong>Total Quantity: <span class="badge badge-info">{{$totalQty}}</span></strong>--}}
                                               {{--</div>--}}


                                           </div><hr>




                                       </div>
                                   </div>

                                @endforeach

                                    <div class=" row justify-content-center pagination-lg">{{ $orders->links() }}</div>

                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">profile</div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">contact</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
