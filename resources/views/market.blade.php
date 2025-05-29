@php
$totalPages = ceil($countProducts / $offset);
$showPages = 3;
@endphp

@extends("layouts.master")

@section('title', 'Продукты')

@section('css')
<link rel="stylesheet" href="{{ asset('css/style-market.css') }}">
@endsection

@section('content')
<div class="setter-products">
	<article class="categories">
		<header>
			<h2 class="h-2"><a class='without-decor color-inh' href='/market'>Продукты</a></h2>
			<div class="categories-listing">
				<ul>
					@foreach ($categories as $key => $value)
					@php
					$currentCategory = isset($slug) ? $slug : 'all';
					$isActive = ($key === $currentCategory) ? 'bold' : '';
					$link = ($key === 'all') ? "/market" : "/market/$key";
					@endphp
					<li><a href="{{ $link }}" class="products-category-link {{ $isActive }}">{{ $value['name'] }}</a></li>
					@endforeach
				</ul>
			</div>
		</header>
	</article>
	<article class="offset-select">
		<div class="offset">
			<button class="offset-btn">
				12
				<div class="ag94-a"></div>
			</button>
			<button class="offset-btn">
				24
				<div class="ag94-a"></div>
			</button>
			<button class="offset-btn">
				48
				<div class="ag94-a"></div>
			</button>
		</div>
	</article>
</div>

<article class="cards">
	@foreach ($products as $product)
	<section class='card' data-product_id='{{ $product['id'] }}' id='clickable'>
		<img src='{{ asset($product['image_url']) }}' class='img-card'>
		<div class='left-corner-desc roboto-text'>
			<h4 class='bright-text'>{{ $product['title'] }}</h4>
			<span class='faded-text'>₽ {{ $product['discount_price'] }} RUB</span>
		</div>
	</section>
	@endforeach
</article>

@if($totalPages >= 1)
<article class="pagination">
	<div class="paginate">
		<ul>
			@for($i = 1; $i <= $totalPages; $i++)
				@if($i==1 || $i==$totalPages || ($i>= $page - $showPages && $i <= $page + $showPages))
					<li class="offset-btn {{ $i == $page ? 'current' : '' }}">
					{{ $i }}
					<div class="ag94-a"></div>
					</li>
					@elseif($i == $page - ($showPages + 1) || $i == $page + ($showPages + 1))
					...
					@endif
					@endfor
		</ul>
	</div>
</article>
@endif
@endsection

@section('scripts')
<script src='{{ asset("js/script.js") }}'></script>
<script src='{{ asset("js/offset.js") }}'></script>
@endsection