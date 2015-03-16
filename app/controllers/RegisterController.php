<?php
class RegisterController extends BaseController {
	
	public function getIndex() {
		return View::make('register');
	}


	public function getLogin() {
		return View::make('login.login');
	}

}
?>
