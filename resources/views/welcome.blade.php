@extends('layouts.master')

@section('title', 'Главная')

@section('meta')
<meta name='csrf-token' content='{{ csrf_token() }}'>
@endsection

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
	@include('layouts.cart-view')
</article>
@endsection

@section('scripts')
<script src="{{ asset("js/script.js") }}"></script>
@endsection