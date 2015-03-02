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
Route::get('',['as' => 'main', 'uses' => 'UsersController@main']);
Route::post('/login', ['as' => 'login', 'uses' => 'SessionController@create']);
Route::post('/logout', ['as' => 'logout', 'uses' => 'SessionController@destroy']);
Route::post('/game/update', ['as' => 'game.update', 'uses' => 'UsersController@updateGame']);
Route::resource('users', 'UsersController');
Route::resource('session', 'SessionController');
