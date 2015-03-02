@extends("layouts.default")

@section("content")
	<h1>Fucking home page</h1>
	@if (Auth::guest())
		<h3>Login Part</h3>
		{{ Form::open(['route' => 'login']) }}
		<div>
			{{ Form::label("email", "Email: ") }}
			{{ Form::text("email") }}
			{{ $errors->first('email') }}
		</div>
		<div>
			{{ Form::label("password", "Password: ") }}
			{{ Form::password("password") }}
			{{ $errors->first('password') }}
		</div>
		<div>
			{{ Form::submit("Login") }}
		</div>
		{{ Form::close() }}
		<h3>
			Register Part
		</h3>
		{{ Form::open(['route' => 'users.create', 'method' => 'get']) }}
			{{ Form::submit("Register") }}
		{{ Form::close() }}
	@else
		<h3>Logout Part and Profile</h3>
		<h3>Welcome,
			<?php $user = Auth::user(); ?>
			{{ link_to("/users/{$user->username}", $user->username) }}
		</h3>
		
		{{ Form::open(['route' => 'logout']) }}

		<div>
			{{ Form::submit("Logout") }}
		</div>
		{{ Form::close() }}
	@endif
	<h1>
		
		Ranking table

		@foreach ($top_users as $user)

		<li>{{ link_to("/users/{$user->username}", $user->username) }}: {{ $user->points }}</li>

		@endforeach

	</h1>

	<h1>
		
		Game content here

		<div>
		<h3> Max weight of the sack: {{ $maxWeight }} </h3>			
		
		{{ Form::open(['route' => 'game.update']) }}

			@foreach ($items as $k=>$item)
				{{ Form::checkbox('items[]', $k) }} {{ $k+1 }}) Weight: {{ $item[0] }} and Price: {{ $item[1] }}
				<br>
			@endforeach
			
		{{ Form::submit("Submit") }}
		{{ Form::close() }}

		</div>
	</h1>
@stop

<script src="/js/countdown.js"></script>
