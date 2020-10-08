@extends('layouts.master')

@section('title')
Lravel Shopping cart
@endsection

@section('content')
@if(Session::get('status'))
<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="alert alert-success alert-dismissible fade show">
      {{ Session::get('status') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </div>
  </div>
</div>
@endif
@foreach($products->Chunk(4) as $productchunk)

<div class="row">
	@foreach($productchunk as $product)
  <div class="card col-sm-6 col-md-4 col-lg-3">
  <img class="card-img-top" src="{{ $product->imgpath}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{ $product->title}}</h5>
    <p class="card-text">{{$product->description}}</p>
    <div class="clearfix">
          <div class="pull-left price">${{$product->price}}</div>
        <a href="/add-to-cart/{{$product->id}}" class="btn btn-success pull-right" role="button">Add to Cart</a>
        </div>
  </div>
</div>
  @endforeach
</div>
@endforeach

@endsection