<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ServiceHub | Категория 2 <?php //TODO: Name of the category 
																	?></title>
	<link rel="stylesheet" href="/assets/css/style.css">
	<link rel="stylesheet" href="/assets/css/style-market.css">
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/connect_favicon.php" ?>
</head>

<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/header.php" ?>

	<main>
		<?php
		include $_SERVER['DOCUMENT_ROOT'] . "/pages/market-preview.php";
		showCategories('category2'); // 'category1' - текущая активная категория
		?>
		<article class="cards">
			<?php showCards(8, false); // Показываем меньше карточек для категории 
			?>
		</article>
	</main>

	<?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/footer.html" ?>
	<script src="../../script.js"></script>
</body>

</html>