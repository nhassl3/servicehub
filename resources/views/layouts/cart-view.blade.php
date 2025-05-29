@foreach($reviews as $key => $review)
@php $isReviewPage = isset($review['rating']) && isset($review['comment']); @endphp
<section class="card" data-product_id='{{ $key }}' id='clickable'>
	@if($isReviewPage)<h4 class='bright-text'>{{$review['title']}}</h4>@endif
	<img src="{{ asset($review['image_url']) }}" class='img-card' alt="{{ $review['title'] }}">
	<div class="left-corner-desc roboto-text">
		@if($isReviewPage)
		<div class="faded-text">Рейтинг:&nbsp;{{$review['rating']}}</div>
		<div class="faded-text">{{ $review['comment'] }}</div>
		@else
		<div class="bright-text">{{ $review['title'] }}</div>
		<div class="faded-text">₽ {{ $review['discount_price'] }} RUB</div>
		@endif
	</div>
</section>
@endforeach