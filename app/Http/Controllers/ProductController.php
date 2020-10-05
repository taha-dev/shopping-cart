<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use Session;

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
}
