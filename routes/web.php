<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');
Route::get('/products', 'ProductController@index')->name('products')->middleware('auth');
Route::get('/products/create', 'ProductController@create')->middleware('auth');
Route::post('/products', 'ProductController@store')->middleware('auth');
Route::get('/products/{id}/edit', 'ProductController@edit')->middleware('auth');
Route::put('/products/{id}', 'ProductController@update')->name('products.update')->middleware('auth');
Route::delete('/products/{id}', 'ProductController@destroy')->middleware('auth');