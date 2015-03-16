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
	/*public function getRegister() {
		return View::make('register');
	}*/


	public function postAdd() {
		$input = Input::all();
		if($input) {
			DB::insert('insert into users (name,email,password) values (?,?,?)', array( $input['name'], $input['email'], $input['password']));
		}
		return Redirect::to('user');

	}
	
	public function getUser() {
		$results = DB::select('select * from users');
		$resultCount=DB::select('select count(id) as count from users');
		return View::make('user')->with('data',$results);
	}

	public function postDel() {
		$input = Input::all();
		DB::table('users')->where('id', '=', $input['uid'])->delete();
		$data['ec'] = 200;
		$data['em'] = 'ok';
		echo json_encode($data);
	}

	public function getUserCount(){
		$resultCount=DB::select('select count(id) as count from users');
		$resultCount = DB::select('select count(id) as count from users');
		return $resultCount[0]->count;
	}
	public function getLo() {
		return View::make('login.login');
	}
	public function postEnter() {
		$input = Input::all();
		$user = DB::table('users')->where('email',$input['email'])->first();
        //如果用户信息获取不为空再判断，解决用户信息为空后提示non-object的问题
        if($user!=null){
            $password = $user->password;
            if($input['password'] == $password) {
                return Redirect::to('home')->with('userInfo',$user->name."(".$user->id.")");
            } else {
                return Redirect::to('lo');
            }
        }else{
            return Redirect::to('lo');
        }

	}
	public function postUpdate(){
		$input = Input::all();
		$userName=Input::get('username');
		echo "用户名修改为$userName";

	}

}
