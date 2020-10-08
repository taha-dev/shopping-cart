@extends('layouts.master')

@section('title')
Lravel Shopping cart
@endsection

@section('content')

<div class="row">
	<div class="col-sm-12 col-md-4">
		<h1>Checkout</h1>
		<h4>Your Total: ${{ $total }}</h4>
		<form action="/checkout" method="post" id="checkout-form">
			@csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required="required">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" name="address" id="address" placeholder="Address" required="required">
  </div>
  <div class="form-group">
    <label for="card-name">Card Holder Name</label>
    <input type="text" class="form-control" id="card-name" placeholder="Card Holder Name" required="required">
  </div>
  <div class="form-group">
    <label for="card-num">Credit Card Number</label>
    <input type="text" class="form-control" id="card-num" placeholder="Credit Card Number" required="required">
  </div>
  <div class="form-group">
    <label for="card-exp-mo">Expiration Month</label>
    <input type="text" class="form-control" id="card-exp-mo" placeholder="Expiration Month" required="required">
  </div>
  <div class="form-group">
    <label for="card-exp-year">Expiration Year</label>
    <input type="text" class="form-control" id="card-exp-year" placeholder="Expiration Year" required="required">
  </div>
  <div class="form-group">
    <label for="card-cvc">CVC</label>
    <input type="text" class="form-control" id="card-cvc" placeholder="CVC" required="required">
   </div>
  <button type="submit" class="btn btn-success">Pay</button>
		</form>
	</div>
</div>
@endsection