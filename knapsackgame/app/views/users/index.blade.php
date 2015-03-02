@extends('layouts.default')

@section('content')
	<div class="welcome">
		<h1>All Users</h1>
		@foreach ($users as $user)
			<li> {{ link_to("/users/{$user->username}", $user->username) }} </li>
		@endforeach
	</div>
@stop