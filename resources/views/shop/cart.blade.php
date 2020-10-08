@extends('layouts.master')

@section('title')
Lravel Shopping cart
@endsection

@section('content')

@if(Session::has('cart'))
<div class="row">
	<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
		<ul class="list-group">
  	@foreach($products as $product)
    <li class="list-group-item">
    	<strong>{{ $product['item']['title']}}</strong>
    	<span class="badge badge-success">{{ $product['price'] }}</span>
  <button class="btn btn-secondary btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="reduce/{{ $product['item']['id'] }}">Reduce by 1</a>
    <a class="dropdown-item" href="remove/{{ $product['item']['id'] }}">Reduce All</a>
  </div>
    	<span class="badge badge-info">{{ $product['qty']}}</span>
    </li>
    @endforeach
</ul>
</div>
</div>
<div class="row">
	<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
		<strong>Total: {{ $totalPrice }}</strong>
</div>
</div>
<hr>
<div class="row">
	<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
		<a href="/checkout" class="btn btn-success">Checkout</a>
</div>
</div>
@else
<div class="row">
	<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
		<h2>No Items in Cart</h2>
</div>
</div>
@endif

@endsection