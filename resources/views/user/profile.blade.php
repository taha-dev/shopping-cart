@extends('layouts.master')

@section('title')
Lravel Shopping cart
@endsection

@section('content')
<div class="row">
	<div class="col-sm-12">
		<h1>User Profile</h1>
		<hr>
		<h2>My Orders</h2>
		@foreach($orders as $order)
		<div class="panel panel-default">
			<div class="panel-body">
				<ul class="list-group">
					@foreach($order->cart->items as  $item)
					<li class="list-group-item">
						{{ $item['item']['title']}} | {{ $item['qty']}} Units
						<span class="badge badge-info">{{ $item['price'] }}</span>
					</li>
					@endforeach
				</ul>
			</div>
			<div class="panel-footer">
				<strong>Total Price: ${{ $order->cart->totalPrice}}</strong>
			</div>
		</div>
		<br>
		@endforeach
	</div>
</div>
@endsection