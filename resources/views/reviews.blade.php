@extends('layouts.master')

@section('title', "Отзывы")

@section('css')
<style>
	main {
		margin: 3em 0;
		padding: 0;
		min-width: 100%;
		max-height: 100%;
	}

	.faded-text:last-child {
		margin-top: 1rem;
	}
</style>
@endsection

@section('content')
<article class="cards">
	@include('layouts.cart-view')
</article>
@endsection