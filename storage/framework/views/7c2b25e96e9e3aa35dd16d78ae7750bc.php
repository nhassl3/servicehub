<?php
use Illuminate\Support\Facades\Auth;

$user = Auth::check();
?>



<?php $__env->startSection("meta"); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset("css/style-card.css")); ?>">
<link rel="stylesheet" href="<?php echo e(asset("css/style-input.css")); ?>">
<link rel="stylesheet" href="<?php echo e(asset("css/style-notification.css")); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection("title", $product['title']); ?>

<?php $__env->startSection("content"); ?>
<div class="container">
	<article class="image">
		<a href="#start-detail"><img src="<?php echo e(asset($product['image_url'])); ?>" alt="<?php echo e($product['title']); ?>"></a>
	</article>
	<article class="desc-right">
		<div class="product-detail" id='start-detail'>
			<header><?php echo e($product['title']); ?></header>
			<span class="price" style='font-size: 16px; text-decoration: line-through;'>₽ <?php echo e($product['price']); ?> RUB&nbsp;</span>
			<span class="price">₽ <?php echo e($product['discount_price']); ?> RUB</span>
			<span class="description"><?php echo e($product['description']); ?></span>
		</div>
		<hr class="hr-bright">
		<div class="w-list-unstyled">
			<ul>
				<li>
					<div class="align-left-list">Вес приложения</div>
					<div class="align-right-list">
						<div class="weight-of-the-product"><?php echo e($product['weight']); ?></div>
						<div class="unit"><?php echo e($product['unity_weight']); ?></div>
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
						<div class="secret-password" id='toggle-password-btn'>
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
					<button type="submit" class="btn-submit" id='success-adding-to-cart' data-logged='<?php echo e(!empty($user) ? "1" : "0"); ?>' data-product_id='<?php echo e($product['id']); ?>' data-alert='1'>добавить в корзину</button>
					<button type="submit" class="btn-submit" id='fast-buy-btn' data-product_id='<?php echo e($product["id"]); ?>'>купить</button>
				</div>
			</div>
		</div>
	</article>
</div>
<div class="notifications"></div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("scripts"); ?>
<script src='<?php echo e(asset("js/script.js")); ?>'></script>
<script src="<?php echo e(asset("js/notifications.js")); ?>"></script>
<script src="<?php echo e(asset("js/card.js")); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/nhassl3/projects/servicehub/resources/views/card.blade.php ENDPATH**/ ?>