<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ServiceHub | Стать продавцом</title>
	<link rel="stylesheet" href="/assets/css/style.css">
	<link rel="stylesheet" href="/assets/css/style-market.css">
	<!-- DEVELOP STYLE -->
	<link rel="stylesheet" href="/assets/css/style-in-develop.css">
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/connect_favicon.php" ?>
</head>

<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/header.php" ?>

	<main>
		<?php include $_SERVER["DOCUMENT_ROOT"] . "/pages/in-develop.php" ?>
	</main>

	<?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/footer.html" ?>
</body>

</html>