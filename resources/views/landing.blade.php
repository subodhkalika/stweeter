@extends('layouts.app')

@section('content')
	<div class="text-center">
		<h1>WELCOME TO STWEETER</h1>
		@guest
			<h3><a href="/login">Login</a> or <a href="/register">Register</a> to start stweeting</h3>
		@else
			Start Tweeting. Go to your <a href="/profile">Profile</a>
		@endguest
	</div>
@endsection