<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ServiceHub | Цифровой продукт; name-of-the-product</title>
	<link rel="stylesheet" href="/assets/css/style.css">
	<link rel="stylesheet" href="/assets/css/style-card.css">
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/connect_favicon.php" ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/pages/header.php'; ?>

	<main>
		<article class="image">
			<img src="https://cdn.prod.website-files.com/67d171cf69fdf4b81a514090/67d171cf69fdf4b81a5140cc_store-item-1.jpg" alt="name-of-the-product">
		</article>
		<article class="desc-right">
			<div class="product-detail">
				<header>Unbelievable</header>
				<span class="price">₽ 4500.00 RUB</span>
				<span class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, sint!</span>
			</div>
			<hr class="hr-bright">
			<div class="w-list-unstyled">
					<ul>
							<li>
									<div class="align-left-list">Weight</div>
									<div class="align-right-list">
											<div class="weight-of-the-product">15</div>
											<div class="unit">MB</div>
									</div>
							</li>
							<li>transform
									<div class="align-left-list">Permissions</div>
									<div class="align-right-list"><div class="right-of-the-product">All rights</div></div>
							</li>
							<li>
									<div class="align-left-list">Password</div>
									<div class="align-right-list">
											<div class="secret-password">secret-password-01</div>
									</div>
							</li>
					</ul>
			</div>
			<hr class="hr-bless">
			<div class="w-commerce-cartform">
				<div class="color">
					<div><label for="version-select" class="header-commerce-cartform">versions</label></div>
					<div>
						<select name="version" id="version-select" require>
							<!-- Count of options impact from count of the versions releases on GitHub page -->
							<!-- TODO: Realize on php backend options -->
							<div class="versions">
								<option class="option-select" value="" disabled selected>Select version</option>
								<option class="option-select" value="v0.0.1">v0.0.1</option>
								<option class="option-select" value="v0.1.0">v0.1.0</option>
								<option class="option-select" value="v0.1.4">v0.1.4 <div class="recommend">(recommend)</div></option>
								<option class="option-select" value="v1.0.1">v1.0.1</option>
							</div>
						</select>
					</div>
				</div>
				<div class="count">
					<div><label for="quantity" class="header-commerce-cartform">quantity of accounts/license</label></div>
					<div class="product-detail-cta-wrap">
						<div class="select-count-of-product">
							<input class="option-select" type="number" min="1" max="10" id="quantity" name="quantity" value="1" require>
						</div>
						<button type="submit" class="btn-submit">add to cart</button>
						<button type="submit" class="btn-submit">buy now</button>
					</div>
				</div>
			</div>
		</article>
	</main>

	<?php include $_SERVER['DOCUMENT_ROOT'] . '/pages/footer.php'; ?>
</body>
</html>