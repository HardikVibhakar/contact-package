<?php

use Illuminate\Http\Request;

Route::get('calculator', function(){
	echo 'Hello from the calculator package!';
});

Route::group(['namespace'=>'Devdojo\Calculator'],function(){
	Route::get('contact', 'EmailController@index')->name('contact');

	Route::post('contact', 'EmailController@send');
	Route::get('add/{a}/{b}', 'EmailController@add');
	Route::get('subtract/{a}/{b}', 'EmailController@subtract');
});
