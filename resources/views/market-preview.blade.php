<?php
function showCategories($currentCategory = 'all', $countOfCategories = 4)
{
	// Array categories - in reality may get from database
	$categories = [
		'all' => 'все продукты',
	];

	for ($i = 1; $i <= $countOfCategories; $i++) {
		$categories["category$i"] = "категория $i";
	}

	echo "<article class=\"categories\">
	<header>
			<h2 class=\"h-2\"><a style='color: #000; text-decoration: none; cursor: default;' href='/pages/market.php'>Продукты</a></h2>
			<div class=\"categories-listing\">
					<ul>";

	// TODO: PHP adding categories to market sort

	foreach ($categories as $key => $value) {
		$isActive = ($key === $currentCategory) ? 'bold' : '';
		$link = ($key === 'all') ? "/pages/market.php" : "/pages/category/market-$key.php";

		echo "<li><a href=\"$link\" class=\"products-category-link $isActive\" id=\"$key\">$value</a></li>";
	};

	echo "</ul>
					</div>
				</header>
</article>";
}

function showCards($countOfCards = 16, $allCards = true)
{
	if ($allCards) {
		$startCard = 1;
		$countOfCards = 16;
	} else {
		if ($countOfCards >= 4 && $countOfCards <= 16) {
			$startCard = $countOfCards - 3;
		} else {
			$startCard = 1;
			$countOfCards = 16;
		}
	}

	for ($i = $startCard; $i <= $countOfCards; $i++) {
		$randomPrice = random_int(500, 5000);
		echo "<section class='card' id='clickable'>
				<img src='https://cdn.prod.website-files.com/67d171cf69fdf4b81a514090/67d171cf69fdf4b81a5140cc_store-item-1.jpg'class='img-card' alt='card-$i'>
				<div class='left-corner-desc roboto-text'>
						<h4 class='bright-text'>товар $i</h4>
						<span class='faded-text'>₽ $randomPrice RUB</span>
				</div>
		</section>";
	};
}
