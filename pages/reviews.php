<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ServiceHub | Отзывы</title>
	<link rel="stylesheet" href="/assets/css/style.css">
	<link rel="stylesheet" href="/assets/css/style-reviews.css">
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/connect_favicon.php" ?>
</head>

<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/header.php" ?>

	<main>
		<article class="cards">
			<?php
			for ($i = 1; $i <= 8; $i++) {
			?>
				<section class="card" id='clickable'>
					<img src="https://cdn.prod.website-files.com/67d171cf69fdf4b81a514090/67d171cf69fdf4b81a5140cc_store-item-1.jpg" alt="review-<?= $i ?>">
					<div>
						<h2 class="big-less-weight">Review#<?= $i ?></h2>
						<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis ex cumque, a veritatis iure ea! Sint molestiae corporis atque autem!</div>
					</div>
				</section>
			<?php
			}
			?>
		</article>
	</main>

	<?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/footer.html" ?>
	<script src="../script.js"></script>
</body>

</html>