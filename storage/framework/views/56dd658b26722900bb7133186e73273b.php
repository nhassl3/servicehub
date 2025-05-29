

<?php $__env->startSection('title', 'О нас'); ?>

<?php $__env->startSection("css"); ?>
<link href="<?php echo e(asset('css/style-about.css')); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<article class="first-about">
	<section>
		<header>
			<h2 class='h-2'>О нас</h2>
			<div>Купи, продай, создай - всё в одном месте</div>
		</header>
	</section>
</article>
<article class="second-about">
	<header>
		<h2 class='big-less-weight'>Это история нашей жизни</h2>
		<hr class="w-50-line" />
	</header>
	<section class="left-space-section area">
		<div>
			Мы - команда энтузиастов, создающих безопасное и удобное пространство для торговли. Наш маркетплейс объединяет творцов, бизнесменов и покупателей, помогая каждому находить и предлагать лучшие товары
		</div>
	</section>
	<section class="right-space-section area">
		<div>
			Мы создаем комфортное условия для ваших продаж:
			<ul>
				<li>Простая регистрация</li>
				<li>Минимальная комиссия</li>
				<li>Широкая аудитория покупателей</li>
				<li>Поддержка 24/7</li>
			</ul>
		</div>
	</section>
</article>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/nhassl3/projects/servicehub/resources/views/about.blade.php ENDPATH**/ ?>