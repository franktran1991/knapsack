<?php

class SessionController extends BaseController {

	public function create(){

		$user = array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
			);
		
		Auth::attempt($user, true);
		
		return Redirect::route('main')->withInput();	

	}

	public function destroy(){

		Auth::logout();

		return Redirect::route('main');	

	}
}