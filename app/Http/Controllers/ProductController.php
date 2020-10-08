<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use Session;
use App\Order;
use Auth;

class ProductController extends Controller
{
    public function getIndex()
    {
    	$products = Product::all();
    	return view('shop.index',['products' => $products]);
    }
    public function addtocart(Request $r, $id)
    {
    	$product = Product::find($id);
    	$oldCart = Session::has('cart')? Session::get('cart'): null;
    	$cart = new Cart($oldCart);
    	$cart->add($product,$product->id);

    	$r->session()->put('cart',$cart);
    	return redirect('/');
    }
    public function getreducebyone($id)
    {
    	$oldCart = Session::has('cart')? Session::get('cart'): null;
    	$cart = new Cart($oldCart);
    	$cart->reducebyone($id);

    	if (count($cart->items) > 0) {
    		Session::put('cart', $cart);
    	}
    	else
    	{
    		Session::forget('cart');
    	}
    	return redirect('/cart');
    }
    public function getremoveitem($id)
    {
    	$oldCart = Session::has('cart')? Session::get('cart'): null;
    	$cart = new Cart($oldCart);
    	$cart->removeitem($id);
    	if (count($cart->items) > 0) {
    		Session::put('cart', $cart);
    	}
    	else
    	{
    		Session::forget('cart');
    	}
    	return redirect('/cart');
    }
    public function cart()
    {
    	if (!Session::has('cart')) {
    		return view('shop.cart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	return view('shop.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
    public function checkout()
    {
    	if (!Session::has('cart')) {
    		return view('shop.cart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	$total = $cart->totalPrice;
    	return view('shop.checkout', ['total' => $total]);
    }
    public function postcheckout(Request $r)
    {
    	if (!Session::has('cart')) 
    	{
    		return redirect('cart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	$order = new Order();
    	$order->user_id = Auth::user()->id;
    	$order->cart = serialize($cart);
    	$order->address = $r->input('address');
    	$order->name = $r->input('name');
    	$order->bill = $cart->totalPrice;
    	$order->save();
    	Session::forget('cart');
    	$r->session()->flash('status', 'Order placed successfully');
    	return redirect('/');
    }
}
