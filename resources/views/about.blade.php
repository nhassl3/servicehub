<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		ServiceHub | О нас
	</title>
	<link href="/assets/css/style.css" rel="stylesheet" />
	<link href="/assets/css/style-about.css" rel="stylesheet" />
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/connect_favicon.php'; ?>
</head>

<body>
	<?php include 'header.php'; ?>

	<main>
		<article class="first-about">
			<section>
				<header>
					<h2 class='h-2'>О нас</h2>
					<div>Купи, продай, создай - всё в одном месте</div>
				</header>
			</section>
		</article>
		<article class="second-about">
			<header>
				<h2 class='big-less-weight'>Это история нашей жизни</h2>
				<hr class="w-50-line" />
			</header>
			<section class="left-space-section area">
				<div>
					Мы - команда энтузиастов, создающих безопасное и удобное пространство для торговли. Наш маркетплейс объединяет творцов, бизнесменов и покупателей, помогая каждому находить и предлагать лучшие товары
				</div>
			</section>
			<section class="right-space-section area">
				<div>
					Мы создаем комфортное условия для ваших продаж:
					<ul>
						<li>Простая регистрация</li>
						<li>Минимальная комиссия</li>
						<li>Широкая аудитория покупателей</li>
						<li>Поддержка 24/7</li>
					</ul>
				</div>
			</section>
		</article>
	</main>

	<?php include $_SERVER['DOCUMENT_ROOT'] . '/pages/footer.html'; ?>
</body>