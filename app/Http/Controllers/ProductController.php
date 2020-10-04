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
    	dd($r->session()->get('cart'));
    	return redirect('/');
    }
}
