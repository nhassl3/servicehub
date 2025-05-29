<?php $__env->startSection("title", "Корзина"); ?>

<?php $__env->startSection('meta'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection("css"); ?>
<link rel="stylesheet" href="<?php echo e(asset("css/style-shopping-cart.css")); ?>">
<link rel="stylesheet" href="<?php echo e(asset("css/style-input.css")); ?>">
<link rel="stylesheet" href="<?php echo e(asset("css/style-gocheckout-section.css")); ?>">
<link rel="stylesheet" href="<?php echo e(asset("css/style-notification.css")); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
<?php if($countCartItems > 0): ?>
<header>
	<h2 class="h-2"><a href="#right-section-buy" class="link cur-d">Корзина</a>
		<div class="above-header" id="counts-of-goods"><?php echo e($countCartItems); ?></div>
	</h2>
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
				<?php $firstElementId = array_key_first($products) ?>
				<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($key !== $firstElementId): ?>
				<hr class="w50-line" style='margin-bottom: 1.7em;'>
				<?php endif; ?>
				<div class="product-card" data-cart_item_id="<?php echo e($key); ?>">
					<section class="card">
						<label class="custom-checkbox" for="checkbox-<?php echo e($key); ?>">
							<input type="checkbox" data-checkbox_id="<?php echo e($key); ?>" checkbox-id="checkbox-element" id='checkbox-<?php echo e($key); ?>'>
							<span class="custom-checkbox__checkmark"></span>
							<span class="custom-checkbox__label"></span>
						</label>
						<img src="<?php echo e(asset($product['image_url'])); ?>" alt="shopping-cart-good-<?php echo e($key); ?>">
					</section>
					<div class="desc">
						<div class="description-text">
							<div class="short-description" onclick="openModal('description', <?= $key ?>);">
								<?php echo e($product['description'] ?? 0); ?>

							</div>
						</div>

						<?php if($product['isHit']): ?>
						<div class="is-hit a32-panel pd-wm32">
							<div class="fast-buy">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 16 16" class="b294-b0" style="color: rgb(255, 255, 255);">
									<path fill="currentColor" d="M8 2.065c-2-.643-.667 3.71-2 3.71-.667 0-.806-1.258-1.339-1.258C3.994 4.517 2 6.56 2 9.13 2 11.474 3.333 14 6 14c.667 0 1-.212.625-.62-1.875-2.044-1.358-4.042-.63-3.808.94.302 1.823 1.779 2.557-1.35.186-.847.653-.622 1.266 0 .921.932 1.402 2.94-.36 5.157-.291.367.209.621 1.021.621C12.23 14 14 12.106 14 9.13c0-4.004-4-6.423-6-7.065"></path>
								</svg>
								<div class="wb fs-w bold"> Хит продаж</div>
							</div>
							<div class="ag94-a"></div>
						</div>
						<?php endif; ?>

						<div class="panel">
							<div class="manage-panel">
								<button class="like <?php echo e($product['isLike'] ? "clicked" : ""); ?> manage-panel-button a32-panel" data-cart_item_id='<?php echo e($key); ?>'>
									<!-- TODO: CHANGE WITH CLICK -->
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16">
										<path fill="currentColor" d="M16 6.022C16 3.457 14.052 1.5 11.5 1.5c-1.432 0-2.665.799-3.5 1.926C7.165 2.299 5.932 1.5 4.5 1.5 1.948 1.5 0 3.457 0 6.022c0 2.457 1.66 4.415 3.241 5.743 1.617 1.358 3.387 2.258 4.062 2.577.444.21.95.21 1.394 0 .675-.32 2.445-1.219 4.062-2.577C14.339 10.437 16 8.479 16 6.022"></path>
									</svg>
									<div class="ag94-a" style="background-color: rgb(1, 21, 41);"></div>
								</button>
								<button class="manage-panel-button a32-panel" onclick="openModal('delete', <?= $key ?>);"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16">
										<path fill="currentColor" d="m4.888 3.035.275-.826A2.5 2.5 0 0 1 7.535.5h.93a2.5 2.5 0 0 1 2.372 1.71l.275.825c2.267.09 3.555.406 3.555 1.527 0 .938-.417.938-1.25.938H2.583c-.833 0-1.25 0-1.25-.937 0-1.122 1.288-1.438 3.555-1.528m1.856-.299-.088.266Q7.295 3 8 3t1.345.002l-.089-.266a.83.83 0 0 0-.79-.57h-.931a.83.83 0 0 0-.79.57M2.167 7.167c0-.6.416-.834.833-.834h10c.417 0 .833.235.833.834 0 6.666-.416 8.333-5.833 8.333s-5.833-1.667-5.833-8.333m4.166 1.666a.833.833 0 0 0-.833.834v1.666a.833.833 0 1 0 1.667 0V9.667a.833.833 0 0 0-.834-.834m4.167.834a.833.833 0 1 0-1.667 0v1.666a.833.833 0 1 0 1.667 0z"></path>
									</svg>
									<div class="ag94-a" style="background-color: rgb(1, 21, 41);"></div>
								</button>
								<button class="manage-panel-button a32-panel pd-wm32" data-cart_item_id=<?php echo e($key); ?> onclick="updateUrlParams({ cartItemId: +this.dataset.cart_item_id }, '/gocheckout');">
									<div class="fast-buy">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="b294-b0">
											<path fill="currentColor" d="M4.932 3.64C3.705 4.886.638 8 3.092 8.996l2.454.997c1.227.498 1.227.498.981 1.744l-.368 1.868c-.859 4.36 3.682 0 4.909-1.245s4.294-4.36 1.84-5.357l-2.454-.996c-1.227-.498-1.227-.498-1.022-1.744.088-.539.272-1.246.409-1.868.958-4.36-3.682 0-4.909 1.245"></path>
										</svg>
										<div class="wb fs-w">Купить</div>
									</div>
									<div class="ag94-a"></div>
								</button>
							</div>
						</div>
					</div>

					<div class="price-block">
						<div class="price-with-discount">
							<span class="price"><?php echo e(number_format($product['discount_price'], 0, ".", " ")); ?> ₽ </span><br><span class="with-discount">
								со скидкой</span>
						</div>
						<div class="price-without-discount">
							<span class="price"><?php echo e(number_format($product['price'], 0, ".", " ")); ?> ₽</span>
						</div>
					</div>

					<div class="select-count-block">
						<div class="change-count">
							<button class="minus-btn manage-panel-button a32-panel" disabled="disabled"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
									<path fill="currentColor" d="M5 11a1 1 0 1 0 0 2h14a1 1 0 1 0 0-2z"></path>
								</svg>
								<div class="ag94-a"></div>
							</button>
							<div inputmode="numeric" pattern="[1-9]*" min="1" max="10" class="numeric-input">
								<div class="set-numeric">
									<input inputmode="numeric" pattern="[1-9]*" type="number" class="count-of-good" min="1" max="10" value="<?php echo e($product['quantity']); ?>" data-cart_item_id="<?php echo e($key); ?>" id='count-<?php echo e($key); ?>'>
								</div>
							</div>
							<button class="plus-btn manage-panel-button a32-panel"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
									<path fill="currentColor" d="M12 4a1 1 0 0 0-1 1v6H5a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2h-6V5a1 1 0 0 0-1-1"></path>
								</svg>
								<div class="ag94-a"></div>
							</button>
						</div>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</section>
		</article>
	</article>

	<?php echo $__env->make("gocheckout-section", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

	<div id="modalWindow" class="modal">
		<div class="modal-content">
			<span class="close-btn-modal manage-panel-button a32-panel" onclick="closeModal();">&times;</span>
			<div class="content">
				<div id="description-content">
					<h2>Полное описание товара</h2>
					<hr>
					<p id='modal-description'>

					</p>
				</div>
				<div id="delete-content">
					<h2>Удалить товар</h2>
					<hr>
					<p>
						Вы точно хотите удалить выбранный товар? Отменить данное действие будет невозможно
					</p>
					<button id='delete-card' class="btn-submit sc-btn" style="margin-top: 28px;" data-alert='2'>Удалить</button>
				</div>
				<div id="more-detail-content">
					<h2>Скидки</h2>
					<div class="more-detail-modal">
						<span class="more-detail-span">Скидка на товар</span>
						<span id="discount-modal" class="more-detail-span-discount">−&nbsp;0&nbsp;₽</span>
					</div>
					<hr>
					<div style="display: flex;">
						<h2 style="flex: 1;">Итого</h2>
						<span id="total-modal" class="more-detail-span-discount bold" style="font-size: 16pt;">−&nbsp;0&nbsp;₽</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php else: ?>
	<?php echo $__env->make('empty-cart', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
	</div>
	<?php endif; ?>
</article>
<div class="notifications"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("scripts"); ?>
<script>
	const goodsData = <?= json_encode($products) ?>
</script>
<script src='<?php echo e(asset("js/script.js")); ?>'></script>
<script src="<?php echo e(asset("js/notifications.js")); ?>"></script>
<script src="<?php echo e(asset("js/cart.js")); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/nhassl3/projects/servicehub/resources/views/shopping-cart.blade.php ENDPATH**/ ?>