<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ServiceHub | Корзина</title>
	<link rel="stylesheet" href="/assets/css/style.css">
	<link rel="stylesheet" href="/assets/css/style-shopping-cart.css">
	<link rel="stylesheet" href="/assets/css/style-input.css">
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/connect_favicon.php" ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/header.php" ?>

	<main>
		<?php 
			function sumWeightsGoods($goods) : float {
				$result = 0;
				foreach ($goods as $_ => $good) {
					if ($good['unity_weight'] == "KB") {
						$weight = $good['weight'] / 1024;
					} else {
						$weight = $good['weight'];
					}
					$result += $weight;
				}
				return round($result, 1);
			}

			function sumPriceGoods($goods, $discount=false) : int {
				$prefix = $discount ? "discount_" : "";
				$result = 0;
				foreach ($goods as $_ => $good) {
					$result += $good[$prefix . "price"];
				}
				return $result;
			}

			function splitPrice($price) : string {
				return number_format($price, 0, ".", " ");
			}

			$goods = [
				[
					'name' => 'BlumTap',
					'description' => "Быстрый авто-сборщик на Python подойдет тем, кто хочет заработать больше баллов Blum",
					'image' => '/assets/images/blumtap.png',
					'price' => 1200,
					'discount_price' => 999,
					'weight' => 14,
					'unity_weight' => 'MB'
				],
				[
					'name' => 'Good_1',
					'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae facere cum quibusdam fugit deserunt, error blanditiis in eligendi ipsa harum nulla quod inventore eveniet distinctio commodi eaque asperiores nihil maxime cumque quas, dolore illo. Voluptas expedita quae mollitia voluptate, sint repudiandae minima sed nisi facilis? Numquam, quo aliquid est, animi qui soluta, error eaque facilis laudantium fuga tempore corrupti ipsa?',
					'image' => 'https://cdn.prod.website-files.com/67d171cf69fdf4b81a514090/67d171cf69fdf4b81a5140cc_store-item-1.jpg',
					'price' => 1500,
					'discount_price' => 1199,
					'weight' => 99,
					'unity_weight' => 'MB'
				],
				[
					'name' => 'Good_2',
					'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae facere cum quibusdam fugit deserunt, error blanditiis in eligendi ipsa harum nulla quod inventore eveniet distinctio commodi eaque asperiores nihil maxime cumque quas, dolore illo. Voluptas expedita quae mollitia voluptate, sint repudiandae minima sed nisi facilis? Numquam, quo aliquid est, animi qui soluta, error eaque facilis laudantium fuga tempore corrupti ipsa?',
					'image' => 'https://cdn.prod.website-files.com/67d171cf69fdf4b81a514090/67d171cf69fdf4b81a5140cc_store-item-1.jpg',
					'price' => 5050,
					'discount_price' => 4999,
					'weight' => 564,
					'unity_weight' => 'KB'
				],
				[
					'name' => 'Good_3',
					'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae facere cum quibusdam fugit deserunt, error blanditiis in eligendi ipsa harum nulla quod inventore eveniet distinctio commodi eaque asperiores nihil maxime cumque quas, dolore illo. Voluptas expedita quae mollitia voluptate, sint repudiandae minima sed nisi facilis? Numquam, quo aliquid est, animi qui soluta, error eaque facilis laudantium fuga tempore corrupti ipsa?',
					'image' => 'https://cdn.prod.website-files.com/67d171cf69fdf4b81a514090/67d171cf69fdf4b81a5140cc_store-item-1.jpg',
					'price' => 3999,
					'discount_price' => 2799,
					'weight' => 564,
					'unity_weight' => 'MB'
				],
				[
					'name' => 'Good_4',
					'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae facere cum quibusdam fugit deserunt, error blanditiis in eligendi ipsa harum nulla quod inventore eveniet distinctio commodi eaque asperiores nihil maxime cumque quas, dolore illo. Voluptas expedita quae mollitia voluptate, sint repudiandae minima sed nisi facilis? Numquam, quo aliquid est, animi qui soluta, error eaque facilis laudantium fuga tempore corrupti ipsa?',
					'image' => 'https://cdn.prod.website-files.com/67d171cf69fdf4b81a514090/67d171cf69fdf4b81a5140cc_store-item-1.jpg',
					'price' => 999,
					'discount_price' => 569,
					'weight' => 365,
					'unity_weight' => 'KB'
				],
			];

			if ($goods) {
				?>
				<header>
					<h2 class="h-2">Корзина <div class="above-header" id="counts-of-goods"><?php echo count($goods) ?></div></h2>
				</header>
				<article class="main">
					<article class="left-zone">
						<article class="check-all">
							<label class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<span class="custom-checkbox__checkmark"></span>
								<span class="custom-checkbox__label"></span>
							</label>
							<label for="selectAll" name="select all">Выбрать все</span>
						</article>
						<article class="goods">
							<section class="left-section-buy">
								<div class="buy-selected-goods">Покупка в ServiceHub</div>
								<?php 
								foreach ($goods as $_ => $good) { 
									?>
									<div class="product-card" id="product-data-<?php echo strtolower($good['name']) ?>">
										<section class="card">
												<label class="custom-checkbox" for="checkbox-<?php echo strtolower($good['name']) ?>">
													<input type="checkbox" id="checkbox-<?php echo strtolower($good['name']) ?>" checkbox-id="checkbox-element">
													<span class="custom-checkbox__checkmark"></span>
													<span class="custom-checkbox__label"></span>
												</label>
												<img src="<?php echo $good['image'] ?>"  alt="shopping-cart-good-<?php echo $i ?>">
										</section>
										<div class="desc">
											<div class="description-text">
													<div class="short-description" onclick="openModal('description');">
														<?php echo $good['description'] ?>
													</div>
											</div>

											<div class="is-hit a32-panel pd-wm32">
												<div class="fast-buy">
													<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 16 16" class="b294-b0" style="color: rgb(255, 255, 255);"><path fill="currentColor" d="M8 2.065c-2-.643-.667 3.71-2 3.71-.667 0-.806-1.258-1.339-1.258C3.994 4.517 2 6.56 2 9.13 2 11.474 3.333 14 6 14c.667 0 1-.212.625-.62-1.875-2.044-1.358-4.042-.63-3.808.94.302 1.823 1.779 2.557-1.35.186-.847.653-.622 1.266 0 .921.932 1.402 2.94-.36 5.157-.291.367.209.621 1.021.621C12.23 14 14 12.106 14 9.13c0-4.004-4-6.423-6-7.065"></path></svg>
													<div class="wb fs-w bold"> Хит продаж</div>
												</div>
												<div class="ag94-a"></div>
											</div>

											<div class="panel">
												<div class="manage-panel">
													<button class="like manage-panel-button a32-panel" onclick="this.classList.toggle('clicked');">
														<!-- TODO: CHANGE WITH CLICK -->
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"><path fill="currentColor" d="M16 6.022C16 3.457 14.052 1.5 11.5 1.5c-1.432 0-2.665.799-3.5 1.926C7.165 2.299 5.932 1.5 4.5 1.5 1.948 1.5 0 3.457 0 6.022c0 2.457 1.66 4.415 3.241 5.743 1.617 1.358 3.387 2.258 4.062 2.577.444.21.95.21 1.394 0 .675-.32 2.445-1.219 4.062-2.577C14.339 10.437 16 8.479 16 6.022"></path></svg>
														<div class="ag94-a" style="background-color: rgb(1, 21, 41);"></div>
													</button>
													<button class="manage-panel-button a32-panel" onclick="openModal('delete');"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"><path fill="currentColor" d="m4.888 3.035.275-.826A2.5 2.5 0 0 1 7.535.5h.93a2.5 2.5 0 0 1 2.372 1.71l.275.825c2.267.09 3.555.406 3.555 1.527 0 .938-.417.938-1.25.938H2.583c-.833 0-1.25 0-1.25-.937 0-1.122 1.288-1.438 3.555-1.528m1.856-.299-.088.266Q7.295 3 8 3t1.345.002l-.089-.266a.83.83 0 0 0-.79-.57h-.931a.83.83 0 0 0-.79.57M2.167 7.167c0-.6.416-.834.833-.834h10c.417 0 .833.235.833.834 0 6.666-.416 8.333-5.833 8.333s-5.833-1.667-5.833-8.333m4.166 1.666a.833.833 0 0 0-.833.834v1.666a.833.833 0 1 0 1.667 0V9.667a.833.833 0 0 0-.834-.834m4.167.834a.833.833 0 1 0-1.667 0v1.666a.833.833 0 1 0 1.667 0z"></path></svg><div class="ag94-a" style="background-color: rgb(1, 21, 41);"></div></button>
													<button class="manage-panel-button a32-panel pd-wm32">
														<div class="fast-buy">
															<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="b294-b0"><path fill="currentColor" d="M4.932 3.64C3.705 4.886.638 8 3.092 8.996l2.454.997c1.227.498 1.227.498.981 1.744l-.368 1.868c-.859 4.36 3.682 0 4.909-1.245s4.294-4.36 1.84-5.357l-2.454-.996c-1.227-.498-1.227-.498-1.022-1.744.088-.539.272-1.246.409-1.868.958-4.36-3.682 0-4.909 1.245"></path></svg>
															<div class="wb fs-w">Купить</div>
														</div>
														<div class="ag94-a"></div>
													</button>
												</div>
											</div>
									</div>

									<div class="price-block">
										<div class="price-with-discount">
											<span class="price"><?php echo splitPrice($good['discount_price']) ?> ₽</span> <span class="with-discount">со скидкой</span>
										</div>
										<div class="price-without-discount">
											<span class="price"><?php echo splitPrice($good['price']) ?> ₽</span>
										</div>
									</div>

									<div class="select-count-block">
										<div class="change-count">
											<button class="minus-btn manage-panel-button a32-panel" disabled="disabled"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path fill="currentColor" d="M5 11a1 1 0 1 0 0 2h14a1 1 0 1 0 0-2z"></path></svg><div class="ag94-a"></div></button>
											<div inputmode="numeric" pattern="[1-9]*" min="1" max="10" class="numeric-input">
												<div class="set-numeric">
													<input inputmode="numeric" pattern="[1-9]*" type="number" class="count-of-good" min="1" max="10" value="1" id="input-numeric-<?php echo strtolower($good['name']) ?>">
												</div>
											</div>
											<button class="plus-btn manage-panel-button a32-panel"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path fill="currentColor" d="M12 4a1 1 0 0 0-1 1v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5a1 1 0 0 0-1-1"></path></svg><div class="ag94-a"></div></button>
										</div>
									</div>
								</div>
								<?php
							}	
							?>
							</section>
						</article>
					</article>
					<article class="right-section-buy">
						<section class="enabled">
							<button class="registration-btn">
								<div class="registration">
									<div class="wb bs-w">Перейти к оформлению</div>
								</div>
								<div class="ag94-a"></div>
							</button>
							<div class="large-text">
								<div class="annotation" type='annotation' annotation='[object Object]'>
									<div class="d394-a1">
										<div class="d394-a3">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="color: rgba(0, 26, 52, 0.4);"><path fill="currentColor" d="M12 21c5.584 0 9-3.416 9-9s-3.416-9-9-9-9 3.416-9 9 3.416 9 9 9m1-13a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-2 4a1 1 0 1 1 2 0v4a1 1 0 1 1-2 0z"></path></svg>
										</div>
										<div class="d394-a4" style="color:rgba(0, 26, 52, 0.6);">Если Вы не получили товар - обратитесь в поддержку или к администратору</div>
									</div>
								</div>
							</div>
						</section>

						<section class="info-about-order">
							<!-- <button class="registration-btn" disabled="disabled">
								<div class="registration">
									<div class="wb bs-w">Перейти к оформлению</div>
								</div>
								<div class="ag94-a"></div>
							</button>
							<div class="large-text">
								<div class="annotation" type='annotation' annotation='[object Object]'>
									<div class="d394-a1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="d394-a3" style="color: rgba(0, 26, 52, 0.4);"><path fill="currentColor" d="M12 21c5.584 0 9-3.416 9-9s-3.416-9-9-9-9 3.416-9 9 3.416 9 9 9m1-13a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-2 4a1 1 0 1 1 2 0v4a1 1 0 1 1-2 0z"></path></svg>
										<div class="d394-a4" style="color:rgba(0, 26, 52, 0.6);">Выберите товары, чтобы перейти к оформлению заказа</div>
									</div>
								</div>
							</div> -->

							<div class="order-box">
								<header class="left-section-order-box"><h3>Ваша корзина</h3></header>
								<span class="order-count-goods"><?php echo count($goods); ?> товара • <?php echo sumWeightsGoods($goods) . "&nbsp;MB"; ?></span>
							</div>

							<div class="order-box">
								<span class="left-section-order-box ">Товары (<?php echo count($goods) ?>)</span>
								<span class="count-price-reg price-without"><?php
								$sumWithoutDiscount = sumPriceGoods($goods);
								echo splitPrice($sumWithoutDiscount); ?>&nbsp;₽</span>
							</div>

							<div class="order-box">
								<span class="left-section-order-box">Скидка</span>
								<span class="count-price-reg price-with">−&nbsp;<?php $sumWithDiscount = sumPriceGoods($goods, true);
								$discountPrice = splitPrice($sumWithoutDiscount - $sumWithDiscount);
								echo $discountPrice; ?>&nbsp;₽</span>
							</div>

							<div class="order-box">
								<div class="goto-more-details left-section-order-box" id='more-detail' onclick="openModal('more-detail');">Подробнее</div>
							</div>
										
							<hr>

							<div class="order-box" style="margin-top: 17px;">
								<h2 class="left-section-order-box">Итого</h2>
								<span class="more-detail-span-discount bold" style="font-size: 16pt;"><?php echo splitPrice($sumWithDiscount) ?>&nbsp;₽</span>
							</div>
						</section>
					</article>
				</article>
				<?php
			} else {
				?>
				<article class="empty-cart">
					<section class="empty-field">
						<div class="empty__icon">
							<img src="https://static-basket-01.wbbasket.ru/vol2/site/i/v3/empty/cart.webp" alt="Пустая корзина">
						</div>
						<h2>В корзине пока пусто</h2>
						<p class="basket__text">Загляните в маркет — собрали там товары, которые могут вам понравиться</p>
						<a href="/pages/market.php" class="btn-submit sc-btn" >
							Перейти в маркет
						</a>
					</section>
				</article>
				<?php
			}
		?>

		<div id="modalWindow" class="modal">
			<div class="modal-content">
				<span class="close-btn manage-panel-button a32-panel" onclick="closeModal();">&times;</span>
				<div class="content">
					<div id="description-content">
						<h2>Полное описание товара</h2>
						<hr>
						<p>
							<?php echo $goods[1]['description'] ?>
						</p>
					</div>
					<div id="delete-content">
						<h2>Удалить товар</h2>
						<hr>
						<p>
							Вы точно хотите удалить выбранный товар? Отменить данное действие будет невозможно
						</p>
						<button class="btn-submit sc-btn" style="margin-top: 28px;" onclick="">Удалить</button>
					</div>
					<div id="more-detail-content">
						<h2>Скидки</h2>
						<div class="more-detail-modal">
							<span class="more-detail-span">Скидка на товар</span>
							<span class="more-detail-span-discount">−&nbsp;<?php echo $discountPrice?>&nbsp;₽</span>
						</div>
						<hr>
						<div style="display: flex;">
							<h2 style="flex: 1;">Итого</h2>
							<span class="more-detail-span-discount bold" style="font-size: 16pt;">−&nbsp;<?php echo $discountPrice ?>&nbsp;₽</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<?php include $_SERVER['DOCUMENT_ROOT'] . "/pages/footer.php" ?>

	<script src="/assets/js/cart.js"></script>
</body>
</html>