<?php
session_start();
$productId = 1;
?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ServiceHub | Цифровой продукт; name-of-the-product</title>
	<link rel="stylesheet" href="/assets/css/style.css">
	<link rel="stylesheet" href="/assets/css/style-card.css">
	<link rel="stylesheet" href="/assets/css/style-input.css">
	<link rel="stylesheet" href="/assets/css/style-notification.css">
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/connect_favicon.php" ?>
	<!-- B -->
</head>

<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/pages/header.php'; ?>

	<main>
		<div class="container">
			<article class="image">
				<a href="#start-detail"><img src="https://cdn.prod.website-files.com/67d171cf69fdf4b81a514090/67d171cf69fdf4b81a5140cc_store-item-1.jpg" alt="name-of-the-product"></a>
			</article>
			<article class="desc-right">
				<div class="product-detail" id='start-detail'>
					<header>Название товара</header>
					<span class="price">₽ 4500.00 RUB</span>
					<span class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, repellendus!</span>
				</div>
				<hr class="hr-bright">
				<div class="w-list-unstyled">
					<ul>
						<li>
							<div class="align-left-list">Вес приложения</div>
							<div class="align-right-list">
								<div class="weight-of-the-product">15</div>
								<div class="unit">МБ</div>
							</div>
						</li>
						<li>
							<div class="align-left-list">Права</div>
							<div class="align-right-list">
								<div class="right-of-the-product">Все права</div>
							</div>
						</li>
						<li>
							<div class="align-left-list">Пароль</div>
							<div class="align-right-list">
								<div class="secret-password" onclick="togglePassword(this);">
									<span class="hidden-text">секретный-пароль-01</span>
									<span class="stars">************************</span>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<hr class="hr-bless">
				<div class="w-commerce-cartform">
					<div class="color">
						<div><label for="version-select" class="header-commerce-cartform">версии</label></div>
						<div>
							<select name="version" id="version-select" require>
								<!-- Count of options impact from count of the versions releases on GitHub page -->
								<!-- TODO: Realize on php backend options -->
								<div class="versions">
									<option class="option-select" value="" disabled selected>Выберите версию</option>
									<option class="option-select" value="v0.0.1">v0.0.1</option>
									<option class="option-select" value="v0.1.0">v0.1.0</option>
									<option class="option-select" value="v0.1.4">v0.1.4 <div class="recommend">(recommend)</div>
									</option>
									<option class="option-select" value="v1.0.1">v1.0.1</option>
								</div>
							</select>
						</div>
					</div>
					<div class="count">
						<div><label for="quantity" class="header-commerce-cartform">количество аккаунтов/лицензий</label></div>
						<div class="product-detail-cta-wrap">
							<div inputmode="numeric" pattern="[1-9]*" min="1" max="10" class="numeric-input">
								<div class="set-numeric">
									<input inputmode="numeric" pattern="[1-9]*" type="number" class="count-of-good" id="quantity" min="1" max="10" value="1">
								</div>
							</div>
							<button type="submit" class="btn-submit" id='success-adding-to-cart' data-logged='<?php echo (int) $_SESSION['isLoggedIn']; ?>' data-alert='1'>добавить в корзину</button>
							<button type="submit" class="btn-submit" onclick="gotoBuy(<?php echo $productId ?>);">купить</button>
						</div>
					</div>
				</div>
			</article>
		</div>
		<div class="notifications"></div>
	</main>

	<?php include $_SERVER['DOCUMENT_ROOT'] . '/pages/footer.html'; ?>

	<script src='/script.js'></script>
	<script src="/assets/js/notifications.js"></script>
	<script src="/assets/js/card.js"></script>
</body>

</html>