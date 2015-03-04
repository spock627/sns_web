<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
//
//Route::get('/b',function() 
//{
//	return 'aaaa';
//		
//});
//Route::get('/test',function()
//	{
//		    return 'fuck bitch';
//
//	});
//
//Route::Controller('/', 'HomeController@index');
//Route::get('/fuck', 'HomeController@fuckyou');
//Route::get('/register', 'HomeController@register');
//Route::get('/addUser', 'HomeController@addUser');
Route::get("/fuck",function(){
	return 'First Commit';
});
Route::controller('/', 'HomeController');
