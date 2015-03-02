<?php

class UsersController extends BaseController{

	protected $user;

	public function __construct(User $user){

		$this->user = $user;

	}

	public function index(){
		
		$users = $this->user->all();
		
		return View::make('users.index', ['users'=>$users]);

	}

	public function show($name){
		
		$users = $this->user->whereusername($name)->first();
		
		return View::make('users.show', ['name'=> $users->username]);

	}

	public function create(){

		return View::make('users.create');

	}

	public function store(){

		$input = Input::all();
		//Validate user
		if (!$this->user->fill($input)->isValid()){

			return Redirect::back()->withInput()->withErrors($this->user->errors);

		}

		//Create new user

		$this->user->save();
		
		return Redirect::route('users.index');
	}

	public function main(){
		
		$top_users = $this->user->orderBy('points','desc')->take(10)->get();

		$items = [
			array(1,8),
			array(2,4),
			array(3,0),
			array(2,5),
			array(2,3),
			];

		$maxWeight = 4;

		return View::make('index', ['top_users' => $top_users, 'items'=>$items, 'maxWeight' => $maxWeight]);

	}

	public function updateGame(){
		
		dd(Input::all());

	}

}