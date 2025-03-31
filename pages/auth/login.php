<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ServiceHub | Логин</title>
	<link rel="stylesheet" href="/assets/css/style.css">
	<link rel="stylesheet" href="/assets/css/style-form.css">
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/connect_favicon.php" ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/header.php" ?>

	<main>
		<article>
			<header>
				<h2 class='h-2'>авторизация</h2>
			</header>
			<form style="width: 538px;">
					<section>
						<label for="username" class="lbl-int">Никнейм</label>
						<input type="text" id="username" class="ipt-data" placeholder="Введите никнейм" require/>
					</section>
					<section>
						<label for="password" class="lbl-int">Пароль</label>
						<input type="password" id="password" class="ipt-data" placeholder="Введите пароль" require/>
					</section>
					
					<button type="submit" class="btn-submit">вход</button>
				</form>
		</article>
	</main>

	<?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/footer.php" ?>
</body>
</html>