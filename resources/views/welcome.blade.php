<?php session_start(); ?>
@extends('layouts.master')

@section('title', 'Главная')

@section('content')
<article class="description">
	<header>
		<h2 class='big-less-weight'>Это твое личное пространство</h2>
	</header>
	<hr class='w-50-line'>
	<section class='area left-section'>
		<p>
			Наш маркетплейс предлагает удобный встроенный чат для общения между покупателями и продавцами. Уточняйте детали, договаривайтесь об условиях и обсуждайте предложения в режиме реального времени!
		</p>
	</section>
	<section class='area right-section'>
		<p>
			Наш маркетплейс — это тысячи довольных покупателей и продавцов, сотни успешных сделок ежедневно и бесчисленное количество уникальных товаров. Мы гордимся: более 100 000 активных пользователей, 5 000+ продавцов со всего мира, 98% положительных отзывов, удобные инструменты для продаж и покупок, надежная система защиты сделок
		</p>
	</section>
</article>
<article class="cards">
	<header class="recommend-goods">
		<h2 id='recommend-goods'>Рекомендуемые товары</h2>
		<div class="line-break"></div>
		<p class='faded-text'>Ознакомьтесь с новыми и популярными продуктами</p>
	</header>
	<div class="line-break"></div>
	<section class="card" id='clickable'>
		<img src="https://cdn.prod.website-files.com/67d171cf69fdf4b81a514090/67d171cf69fdf4b81a5140cc_store-item-1.jpg" class='img-card' alt="Топовый товар №1">
		<div class="left-corner-desc roboto-text">
			<h4 class='bright-text'>товар 1</h4>
			<span class='faded-text'>₽ 5000 RUB</span>
		</div>
	</section>
	<section class="card" id='clickable'>
		<img src="{{ asset("images/blumtap.png") }}" class='img-card' alt="Топовый товар №2">
		<div class="left-corner-desc roboto-text">
			<h4 class='bright-text'>blum tap 🫵</h4>
			<span class='faded-text'>₽ 3200 RUB</span>
		</div>
	</section>
	<section class="card" id='clickable'>
		<img src="https://cdn.prod.website-files.com/67d171cf69fdf4b81a514090/67d171cf69fdf4b81a5140cc_store-item-1.jpg" class='img-card' alt="Топовый товар №3">
		<div class="left-corner-desc robot-text">
			<h4 class='bright-text'>товар 3</h4>
			<span class='faded-text'>₽ 4999 RUB</span>
		</div>
	</section>
</article>
@endsection

@section('scripts')
<script src="{{ asset("js/script.js") }}"></script>
<script src='{{ asset("js/auth-visible.js") }}'></script>
@endsection