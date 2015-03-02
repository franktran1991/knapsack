@extends('layouts.default')

@section('content')
	<h1>Register New User</h1>

	{{ Form::open(['route' => 'users.store']) }}
		<div>
			{{ Form::label('email', 'Email: ') }}	
			{{ Form::text('email') }}
			{{ $errors->first('email') }}	
		</div>

		<div>
			{{ Form::label('username', 'Username: ') }}	
			{{ Form::text('username') }}
			{{ $errors->first('username') }}	
		</div>
		
		<div>
			{{ Form::label('password', 'Password: ') }}	
			{{ Form::password('password') }}
			{{ $errors->first('password') }}	
		</div>

		<div>
			
			{{Form::submit('Create User')}}

		</div>
		
	{{ Form::close() }}

@stop