<article id='right-section-buy' class="right-section-buy">
	<section class="disabled-order-box">
		<section class="enabled">
			<button class="registration-btn" disabled="disabled">
				<div class="registration">
					<div class="wb bs-w">Перейти к оформлению</div>
				</div>
				<div class="ag94-a"></div>
			</button>
			<div class="large-text">
				<div class="annotation" type='annotation' annotation='[object Object]'>
					<div class="d394-a1">
						<div class="d394-a3">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="color: rgba(0, 26, 52, 0.4);">
								<path fill="currentColor" d="M12 21c5.584 0 9-3.416 9-9s-3.416-9-9-9-9 3.416-9 9 3.416 9 9 9m1-13a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-2 4a1 1 0 1 1 2 0v4a1 1 0 1 1-2 0z"></path>
							</svg>
						</div>
						<div class="d394-a4" style="color:rgba(0, 26, 52, 0.6);">Выберите товары, чтобы перейти к оформлению заказа</div>
					</div>
				</div>
			</div>
		</section>
	</section>
	<section class="enabled-order-box">
		<section class="enabled">
			<button class="registration-btn" onclick="location.href='/pages/gocheckout.php';">
				<div class="registration">
					<div class="wb bs-w">Перейти к оформлению</div>
				</div>
				<div class="ag94-a"></div>
			</button>
			<div class="large-text">
				<div class="annotation" type='annotation' annotation='[object Object]'>
					<div class="d394-a1">
						<div class="d394-a3">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="color: rgba(0, 26, 52, 0.4);">
								<path fill="currentColor" d="M12 21c5.584 0 9-3.416 9-9s-3.416-9-9-9-9 3.416-9 9 3.416 9 9 9m1-13a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-2 4a1 1 0 1 1 2 0v4a1 1 0 1 1-2 0z"></path>
							</svg>
						</div>
						<div class="d394-a4" style="color:rgba(0, 26, 52, 0.6);">Если Вы не получили товар - обратитесь в поддержку или к администратору</div>
					</div>
				</div>
			</div>
		</section>

		<section class="info-about-order">
			<div class="order-box">
				<header class="left-section-order-box">
					<h3>Ваша корзина</h3>
				</header>
				<span class="order-count-goods">0 товара • 0&nbsp;MB</span>
			</div>

			<div class="order-box">
				<span class="left-section-order-box" id="count-selected-goods">Товары ({{ 0 }})</span>
				<span class="count-price-reg price-without">0&nbsp;₽</span>
			</div>

			<div class="order-box">
				<span class="left-section-order-box">Скидка</span>
				<span class="count-price-reg price-discount">−&nbsp;0&nbsp;₽</span>
			</div>

			<div class="order-box">
				<div class="goto-more-details left-section-order-box" id='more-detail' onclick="openModal('more-detail');">Подробнее</div>
			</div>

			<hr>

			<div class="order-box" style="margin-top: 17px;">
				<h2 class="left-section-order-box">Итого</h2>
				<span id="total" class="more-detail-span-discount bold" style="font-size: 16pt;">0&nbsp;₽</span>
			</div>
		</section>
	</section>
</article>