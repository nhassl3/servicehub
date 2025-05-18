@extends('layouts.master')

@section("title", "Регистрация")

@section("meta")
<meta name="csrf-token" content="{{ csrf_token() }}">
@php
$cspNonce = app('csp-nonce');
@endphp
@endsection

@section("css")
<link rel="stylesheet" href="{{ asset("css/style-form.css") }}">
<link rel="stylesheet" href="{{ asset("css/style-notification.css") }}">
@endsection

@section('content')
<article>
	<header>
		<h2 class='h-2'>регистрация</h2>
	</header>
	<form style="width: 515px;" data-alert='0' id='register' method='post'>
		<section>
			<label for="email" class="lbl-int">email</label>
			<input type="email" id="email" class="ipt-data" placeholder="Введите email" name='email' autocomplete='email' value='{{ old('email') }}' require />
		</section>
		<section>
			<label for="username" class="lbl-int">имя пользователя</label>
			<input type="text" id="username" pattern="[A-Za-zА-Яа-яЁё\s]+" class="ipt-data" placeholder="Введите логин" name='username' autocomplete='additional-name' value="{{ old("username") }}" require />
		</section>
		<section>
			<label for="password" class="lbl-int">пароль</label>
			<input type="password" id="password" class="ipt-data" placeholder="Введите пароль" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*_]).{8,12}$" require />
		</section>
		<section>
			<label for="password_confirmation" class="lbl-int">Повторите пароль</label>
			<input type="password" id="password_confirmation" class="ipt-data" placeholder="Введите пароль повторно" name="password_confirmation" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*_]).{8,12}$" require />
		</section>
		@if(session('errors'))
		<div class="alert alert-danger">
			<ul>
				@foreach(session('errors') as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif

		<button type='submit' class="btn-submit" style="letter-spacing: 1px;">зарегистрироваться</button>
	</form>
	<section class='centralize'>
		<div class='account-actions'><a class='without-decor' href="/auth/login">Войти в аккаунт</a></div>
	</section>
</article>
<div class="notifications"></div>
@endsection

@section('js')
<script src="{{ asset("js/notifications.js") }}" nonce='{{ $cspNonce }}'></script>
<script src="{{ asset("js/register.js") }}" nonce='{{ $cspNonce }}'></script>
@endsection