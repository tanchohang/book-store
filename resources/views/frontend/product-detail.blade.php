@extends('layouts.app')

@section('content')
<div class="container card">
    <div class="row">
        <aside class="col-md-3 offset-md-1 border-right m-auto">
            <img src=" {{($book->id>50)?asset('storage/uploads/'.$book->imgUrl):$book->imgUrl}}" alt="{{$book->title}}" width="200" height="300" >
        </aside>
        <aside class="col-md-7">
            <article class="card-body p-5">
                <h3 class="title mb-3">{{$book->title}}</h3>

                <p class="price-detail-wrap">
	<span class="price h3 text-warning">
		<span class="currency">Rs.</span><span class="num">{{$book->price}}</span>
	</span>

                </p> <!-- price-detail-wrap .// -->
                <dl class="item-property">
                    <dt>Description</dt>
                    <dd><p>{{$book->description}} </p></dd>
                </dl>
                <dl class="param param-feature">
                    <dt>ISBN#</dt>
                    <dd>{{$book->isbn}}</dd>
                </dl>  <!-- item-property-hor .// -->
                <dl class="param param-feature">
                    <dt>Author</dt>
                    <dd>{{$book->author}}</dd>
                </dl>  <!-- item-property-hor .// -->

                <hr>
                <div class="row">
                        <div class="col-sm-5">
                            <dl class="param param-inline">
                                <dt>Quantity: </dt>
                                <dd>
                                    <input type="number" class="form-control" id="quantity" min="1" required>
                                </dd>

                            </dl>  <!-- item-property .// -->
                        </div> <!-- col.// -->
                </div> <!-- row.// -->
                <hr>

                <a href="{{route('addToCart',['id'=>$book->id])}}"  class="btn btn-lg btn-outline-primary text-uppercase">
                    <i class="fas fa-shopping-cart"></i> Add to cart </a>

            </article> <!-- card-body.// -->
        </aside> <!-- col.// -->
    </div> <!-- row.// -->
</div> <!-- card.// -->

@stop