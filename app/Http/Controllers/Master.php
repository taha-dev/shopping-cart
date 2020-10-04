<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class Master extends Controller
{
    function logout()
    {
    	Auth::logout();
    	return view('auth.login');
    }
}
