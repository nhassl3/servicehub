<?php
$nonce = base64_encode(string: random_bytes(16));
header("Content-Security-Policy: default-src 'self'; script-src 'self' notifications.js; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; img-src 'self' data:;");
?>

@extends("layouts.master")

@section("title", "Логин")

@section("css")
<link rel="stylesheet" href="{{ asset("css/style-form.css") }}">
<link rel="stylesheet" href="{{ asset("css/style-notification.css") }}">
@endsection

@section("content")
<article>
	<header>
		<h2 class='h-2'>авторизация</h2>
	</header>
	<form style="width: 538px;" method="post" action='javascript:void(0);'>
		<section>
			<label for="username" class="lbl-int">имя пользователя</label>
			<input type="text" id="username" class="ipt-data" minlength="2" maxlength="50" pattern="[A-Za-zА-Яа-яЁё\s]+" placeholder="Введите никнейм" autocomplete='additional-name' require />
		</section>
		<section>
			<label for="password" class="lbl-int">пароль</label>
			<input type="password" id="password" class="ipt-data" placeholder="Введите пароль" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*_]).{8,12}$" require />
		</section>
		<button data-alert='0' class="btn-submit" id='log-in'>вход</button>
	</form>
	<section class='centralize'>
		<div class='account-actions'><a class='without-decor' href="/pages/auth/register.php">Зарегистрироваться</a></div>
	</section>
</article>
<div class="notifications"></div>
@endsection

@section('js')
<script src="{{ asset("js/notifications.js") }}"></script>
<script src="{{ asset("js/login.js") }}"></script>
@endsection