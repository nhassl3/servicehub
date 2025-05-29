@extends('layouts.master')

@section("title", "Регистрация")

@section("meta")
<meta name="csrf-token" content="{{ csrf_token() }}">
@php
$cspNonce = app('csp-nonce');
@endphp
@endsection

@section("css")
<link rel="stylesheet" href="{{ asset('css/style-form.css') }}">
<link rel="stylesheet" href="{{ asset('css/style-notification.css') }}">
@endsection

@section('content')
<article>
	<header>
		<h2 class='h-2'>регистрация</h2>
	</header>

	@isset($errors)
	@if ($errors->any())
	<div class="alert alert-danger" style="margin-bottom: 20px;">
		<ul style="list-style: none; padding: 0; margin: 0;">
			@foreach ($errors->all() as $error)
			<li style="color: #dc3545; margin-bottom: 5px;">{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	@endisset

	@if(session('success'))
	<div class="alert alert-success" style="margin-bottom: 20px;">
		{{ session('success') }}
	</div>
	@endif

	<form style="width: 515px;" id='register' data-alert='0' method='POST' action="{{ route('auth.register') }}">
		@csrf

		<section>
			<label for="email" class="lbl-int">email</label>
			<input type="email" id="email" class="ipt-data @error('email') is-invalid @enderror"
				placeholder="Введите email" name='email' autocomplete='email'
				value='{{ old('email') }}' required />
		</section>

		<section>
			<label for="username" class="lbl-int">имя пользователя</label>
			<input type="text" id="username" class="ipt-data @error('username') is-invalid @enderror"
				placeholder="Введите логин" name='username' autocomplete='username'
				value="{{ old('username') }}" required />
		</section>

		<section>
			<label for="password" class="lbl-int">пароль</label>
			<input type="password" autocomplete='new-password' id="password" class="ipt-data @error('password') is-invalid @enderror"
				placeholder="Введите пароль" name="password" required />
		</section>

		<section>
			<label for="password_confirmation" class="lbl-int">Повторите пароль</label>
			<input type="password" autocomplete='new-password' id="password_confirmation" class="ipt-data"
				placeholder="Введите пароль повторно" name="password_confirmation" required />
		</section>

		<button type='submit' class="btn-submit" style="letter-spacing: 1px;">зарегистрироваться</button>
	</form>

	<section class='centralize'>
		<div class='account-actions'><a class='without-decor' href="{{ route('auth.login-view') }}">Войти в аккаунт</a></div>
	</section>
</article>
<div class="notifications"></div>
@endsection

@section('js')
<script src="{{ asset('js/notifications.js') }}" nonce='{{ $cspNonce }}'></script>
@endsection