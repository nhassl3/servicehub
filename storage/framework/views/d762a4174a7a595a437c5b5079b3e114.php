<?php $__env->startSection('title', 'Главная'); ?>

<?php $__env->startSection('meta'); ?>
<meta name='csrf-token' content='<?php echo e(csrf_token()); ?>'>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<article class="description">
	<header>
		<h2 class='big-less-weight'>Это твое личное пространство</h2>
	</header>
	<hr class='w-50-line'>
	<section class='area left-section'>
		<p>
			Наш маркетплейс предлагает удобный встроенный чат для общения между покупателями и продавцами. Уточняйте детали, договаривайтесь об условиях и обсуждайте предложения в режиме реального времени!
		</p>
	</section>
	<section class='area right-section'>
		<p>
			Наш маркетплейс — это тысячи довольных покупателей и продавцов, сотни успешных сделок ежедневно и бесчисленное количество уникальных товаров. Мы гордимся: более 100 000 активных пользователей, 5 000+ продавцов со всего мира, 98% положительных отзывов, удобные инструменты для продаж и покупок, надежная система защиты сделок
		</p>
	</section>
</article>
<article class="cards">
	<header class="recommend-goods">
		<h2 id='recommend-goods'>Рекомендуемые товары</h2>
		<div class="line-break"></div>
		<p class='faded-text'>Ознакомьтесь с новыми и популярными продуктами</p>
	</header>
	<div class="line-break"></div>
	<?php echo $__env->make('layouts.cart-view', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</article>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset("js/script.js")); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/nhassl3/projects/servicehub/resources/views/welcome.blade.php ENDPATH**/ ?>