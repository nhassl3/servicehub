<header id='nav' role='banner'>
	<div class="logo">
		<a href="/" style="text-decoration: none; color: #000;">
			<h1>ServiceHub</h1>
		</a>
	</div>
	<nav class="navigator-links">
		<div class="main-links">
			<ul>
				<li>
					<a href="/market" class='nav-link' id='market'>Продукты</a>
				</li>
				<li>
					<a href="/about" class='nav-link' id='about-us'>О нас</a>
				</li>
				<li>
					<a href="/contacts" class='nav-link' id='contacts'>Контакты</a>
				</li>
				<li>
					<a href="/cart" class='nav-link' id='shopping-cart'>Корзина
						<div class="above-link" id="counts-of-goods">
							@php
							$user = auth()->user();
							if ($user) {
							$count = Cache::remember("countCartItems:user:{$user->id}", 60, function () use ($user) {
							return $user->cart()->with('items')->firstOrFail()->items()->count();
							});
							if ($count > 0) {
							echo $count;
							} else {
							Cache::forget("countCartItems:user:{$user->id}");
							echo '';
							}
							} else {
							echo '';
							}
							@endphp
						</div>
					</a>
				</li>
			</ul>
		</div>
		@include("auth.auth-header")
	</nav>
</header>