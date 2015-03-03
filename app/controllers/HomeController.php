<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		return View::make('mike');
	}

	public function getFuck() {		
		return View::make('aa');
	}

	public function getRegister() {
		return View::make('register');
	}	

	public function postAdd() {
		$input = Input::all();
		if($input) {
			DB::insert('insert into users (id,name,email,password) values (?,?,?,?)', array(1, $input['name'], $input['email'], $input['password']));
		}
		
		return View::make('aa');

	}

}
