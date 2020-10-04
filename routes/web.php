<?php

use Illuminate\Support\Facades\Route;

Route::get('/','ProductController@getIndex')->middleware('auth');
Route::get('/logout','Master@logout');
Route::get('add-to-cart/{id}','ProductController@addtocart');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
