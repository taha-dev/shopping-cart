<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;

class Master extends Controller
{
	function profile()
	{
		$orders = Order::all()->where('user_id',Auth::user()->id);
		$orders->transform(function($order, $key)
			{
				$order->cart = unserialize($order->cart);
				return $order;
			});
		return view('user.profile', ['orders' => $orders]);
	}
    function logout()
    {
    	Auth::logout();
    	return view('auth.login');
    }
}
