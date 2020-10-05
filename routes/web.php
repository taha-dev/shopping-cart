<?php

use Illuminate\Support\Facades\Route;

Route::get('/','ProductController@getIndex')->middleware('auth');
Route::get('/logout','Master@logout');
Route::get('add-to-cart/{id}','ProductController@addtocart')->middleware('auth');
Route::get('/cart','ProductController@cart')->middleware('auth');
Route::get('/checkout','ProductController@checkout');
Route::post('/checkout','ProductController@postcheckout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
