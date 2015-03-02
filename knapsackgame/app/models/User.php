<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	protected $fillable = ['email', 'password', 'username'];

	public static $rules = [
		'email' => 'required',
		'username' => 'required',
		'password' => 'required',
		'email' => 'unique:users,email',
	];

	public $errors;

	public function isValid(){
		
		$validation = Validator::make($this->attributes, static::$rules);

		if ($validation->passes()) return true;

		$this->errors = $validation->messages();

		return false;
	}

	public function setPasswordAttribute($value){

		$this->attributes['password'] = Hash::make($value);
	}

}
