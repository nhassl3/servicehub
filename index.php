<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		ServiceHub | Главная
	</title>
	<link rel="stylesheet" href="/assets/css/style.css">
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/connect_favicon.php'; ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/pages/header.php'; ?>

	<main>
		<article class="description">
			<header>
				<h2 id='big-less-weight'>Это твое личное пространство</h2>
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
			<section class="card" id='top-card-1'>
				<img src="./assets/images/#01.png" alt="Топовый товар №1">
				<div class="left-corner-desc">
					<h4 class='bright-text roboto-text'>товар 1</h4>
					<span class='faded-text roboto-text'>₽ 5000 RUB</span>
				</div>
			</section>
			<section class="card" id='top-card-2'>
				<img src="./assets/images/blumtap.png" alt="Топовый товар №2">
				<div class="left-corner-desc">
					<h4 class='bright-text roboto-text'>blum tap 🫵</h4>
					<span class='faded-text roboto-text'>₽ 3200 RUB</span>
				</div>
			</section>
			<section class="card" id='top-card-3'>
				<img src="./assets/images/#03.png" alt="Топовый товар №3">
				<div class="left-corner-desc">
					<h4 class='bright-text roboto-text'>товар 3</h4>
					<span class='faded-text roboto-text'>₽ 4999 RUB</span>
				</div>
			</section>
		</article>
	</main>

	<?php include $_SERVER['DOCUMENT_ROOT'] . '/pages/footer.php'; ?>
</body>
</html>