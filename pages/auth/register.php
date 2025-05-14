<?php
session_start();
if (empty($_SESSION['csrf_token'])) {
	$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$nonce = base64_encode(string: random_bytes(16));
header("Content-Security-Policy: default-src 'self'; script-src 'self' notifications.js; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; img-src 'self' data:;");
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ServiceHub | Регистрация</title>
	<link rel="stylesheet" href="/assets/css/style.css">
	<link rel="stylesheet" href="/assets/css/style-form.css">
	<link rel="stylesheet" href="/assets/css/style-notification.css">
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/connect_favicon.php" ?>
</head>

<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/header.php" ?>

	<main>
		<article>
			<header>
				<h2 class='h-2'>регистрация</h2>
			</header>
			<form style="width: 515px;" method='post' action="javascript:void(0);">
				<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

				<section>
					<label for="email" class="lbl-int">email</label>
					<input type="email" id="email" class="ipt-data" placeholder="Введите email" name='email' autocomplete='email' require />
				</section>
				<section>
					<label for="username" class="lbl-int">имя пользователя</label>
					<input type="text" id="username" pattern="[A-Za-zА-Яа-яЁё\s]+" class="ipt-data" placeholder="Введите логин" name='nickname' autocomplete='additional-name' require />
				</section>
				<section>
					<label for="password" class="lbl-int">пароль</label>
					<input type="password" id="password" class="ipt-data" placeholder="Введите пароль" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*_]).{8,12}$" require />
				</section>

				<button data-alert='0' class="btn-submit" id='register' style="letter-spacing: 1px;">зарегистрироваться</button>
			</form>
			<section class='centralize'>
				<div class='account-actions'><a class='without-decor' href="/pages/auth/login.php">Войти в аккаунт</a></div>
			</section>
		</article>
		<div class="notifications"></div>
	</main>

	<?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/footer.html" ?>
	<script nonce='<?= $nonce ?>' src="/assets/js/notifications.js"></script>
	<script nonce='<?= $nonce ?>' src="/assets/js/register.js"></script>
</body>

</html>