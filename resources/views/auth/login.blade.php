@extends("layouts.master")

@section("title", "Логин")

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

@section("content")
<article>
	<header>
		<h2 class='h-2'>авторизация</h2>
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

	<form style="width: 538px;" id='login' data-alert='0' method="post" action='{{ route("auth.login") }}'>
		@csrf

		<section>
			<label for="email" class="lbl-int">email</label>
			<input type="email" id="email" class="ipt-data @error('email') is-invalid @enderror"
				placeholder="Введите email" name='email' autocomplete='email'
				value='{{ old('email') }}' required />
		</section>

		<section>
			<label for="password" class="lbl-int">пароль</label>
			<input type="password" autocomplete='current-password' id="password" class="ipt-data @error('password') is-invalid @enderror"
				placeholder="Введите пароль" name="password" required />
		</section>

		<button type='submit' class="btn-submit">вход</button>
	</form>

	<section class='centralize'>
		<div class='account-actions'><a class='without-decor' href="{{ route('auth.register-view') }}">Зарегистрироваться</a></div>
	</section>
</article>
<div class="notifications"></div>
@endsection

@section('js')
<script src="{{ asset("js/notifications.js") }}" nonce='{{ $cspNonce }}'></script>
@endsection