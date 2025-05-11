<?php
session_start();
if (empty($_SESSION['csrf_token'])) {
	$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; img-src 'self' data:;">
	<title>ServiceHub | Регистрация</title>
	<link rel="stylesheet" href="/assets/css/style.css">
	<link rel="stylesheet" href="/assets/css/style-form.css">
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/connect_favicon.php" ?>
</head>

<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/header.php" ?>

	<main>
		<article>
			<header>
				<h2 class='h-2'>регистрация</h2>
			</header>
			<form style="width: 515px;" method='post'>
				<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

				<section>
					<label for="telephone" class="lbl-int">телефон</label>
					<input type="tel" id="telephone" class="ipt-data" placeholder="Введите телефон" name='telephone' require />
				</section>
				<section>
					<label for="username" class="lbl-int">имя пользователя</label>
					<input type="text" id="username" pattern="[A-Za-zА-Яа-яЁё\s]+" class="ipt-data" placeholder="Введите логин" name='nickname' require />
				</section>
				<section>
					<label for="password" class="lbl-int">пароль</label>
					<input type="password" id="password" class="ipt-data" placeholder="Введите пароль" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*_]).{8,12}$" require />
				</section>

				<button type='submit' class="btn-submit" id='register' style="letter-spacing: 1px;">зарегистрироваться</button>
			</form>
			<section class='centralize'>
				<div class='account-actions'><a class='without-decor' href="/pages/auth/login.php">Войти в аккаунт</a></div>
			</section>
		</article>
	</main>

	<?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/footer.html" ?>
	<script src="/assets/js/register.js"></script>
</body>

</html>