<?php
if (!isset($_SESSION['isLoggedIn'])) {
	$_SESSION['isLoggedIn'] = false;
}

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
	if (!isset($_SESSION['goods'])) {
		$_SESSION['goods'] = [
			[
				'id' => 1,
				'name' => 'BlumTap',
				'description' => "Быстрый авто-сборщик на Python подойдет тем, кто хочет заработать больше баллов Blum",
				'image' => '/assets/images/blumtap.png',
				'price' => 1200,
				'discount_price' => 999,
				'weight' => 14,
				'unity_weight' => 'MB',
				'like' => false,
			],
			[
				'id' => 2,
				'name' => 'Good_1',
				'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae facere cum quibusdam fugit deserunt, error blanditiis in eligendi ipsa harum nulla quod inventore eveniet distinctio commodi eaque asperiores nihil maxime cumque quas, dolore illo. Voluptas expedita quae mollitia voluptate, sint repudiandae minima sed nisi facilis? Numquam, quo aliquid est, animi qui soluta, error eaque facilis laudantium fuga tempore corrupti ipsa?',
				'image' => 'https://cdn.prod.website-files.com/67d171cf69fdf4b81a514090/67d171cf69fdf4b81a5140cc_store-item-1.jpg',
				'price' => 1500,
				'discount_price' => 1199,
				'weight' => 99,
				'unity_weight' => 'MB',
				'like' => false,
			],
			[
				'id' => 3,
				'name' => 'Good_2',
				'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae facere cum quibusdam fugit deserunt, error blanditiis in eligendi ipsa harum nulla quod inventore eveniet distinctio commodi eaque asperiores nihil maxime cumque quas, dolore illo. Voluptas expedita quae mollitia voluptate, sint repudiandae minima sed nisi facilis? Numquam, quo aliquid est, animi qui soluta, error eaque facilis laudantium fuga tempore corrupti ipsa?',
				'image' => 'https://cdn.prod.website-files.com/67d171cf69fdf4b81a514090/67d171cf69fdf4b81a5140cc_store-item-1.jpg',
				'price' => 5050,
				'discount_price' => 4999,
				'weight' => 564,
				'unity_weight' => 'KB',
				'like' => false,
			],
			[
				'id' => 4,
				'name' => 'Good_3',
				'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae facere cum quibusdam fugit deserunt, error blanditiis in eligendi ipsa harum nulla quod inventore eveniet distinctio commodi eaque asperiores nihil maxime cumque quas, dolore illo. Voluptas expedita quae mollitia voluptate, sint repudiandae minima sed nisi facilis? Numquam, quo aliquid est, animi qui soluta, error eaque facilis laudantium fuga tempore corrupti ipsa?',
				'image' => 'https://cdn.prod.website-files.com/67d171cf69fdf4b81a514090/67d171cf69fdf4b81a5140cc_store-item-1.jpg',
				'price' => 3999,
				'discount_price' => 2799,
				'weight' => 564,
				'unity_weight' => 'MB',
				'like' => false,
			],
			[
				'id' => 5,
				'name' => 'Good_4',
				'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae facere cum quibusdam fugit deserunt, error blanditiis in eligendi ipsa harum nulla quod inventore eveniet distinctio commodi eaque asperiores nihil maxime cumque quas, dolore illo. Voluptas expedita quae mollitia voluptate, sint repudiandae minima sed nisi facilis? Numquam, quo aliquid est, animi qui soluta, error eaque facilis laudantium fuga tempore corrupti ipsa?',
				'image' => 'https://cdn.prod.website-files.com/67d171cf69fdf4b81a514090/67d171cf69fdf4b81a5140cc_store-item-1.jpg',
				'price' => 999,
				'discount_price' => 569,
				'weight' => 365,
				'unity_weight' => 'KB',
				'like' => false,
			],
		];
	}
}
?>

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
					<a href="/pages/market.php" class='nav-link' id='market'>Продукты</a>
				</li>
				<li>
					<a href="/pages/about.php" class='nav-link' id='about-us'>О нас</a>
				</li>
				<li>
					<a href="/pages/contacts.php" class='nav-link' id='contacts'>Контакты</a>
				</li>
				<li>
					<a href="/shopping-cart" class='nav-link' id='shopping-cart'>Корзина
						<div class="above-link" id="counts-of-goods">{{ isset($_SESSION['goods']) && $_SESSION['isLoggedIn'] ? count($_SESSION['goods']) : ""}}</div>
					</a>
				</li>
			</ul>
		</div>
		@include("auth.auth-header")
	</nav>
</header>