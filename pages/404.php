<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ServiceHub | Страница не найдена</title>
	<link rel="stylesheet" href="/assets/css/style.css">
	<link rel="stylesheet" href="/assets/css/style-404.css">
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/connect_favicon.php'; ?>
</head>

<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/pages/header.php'; ?>

	<main>
		<h2 class="page404">404</h2>
		<div>Страница не найдена!</div>
	</main>

	<?php include $_SERVER['DOCUMENT_ROOT'] . '/pages/footer.php'; ?>
</body>

</html>