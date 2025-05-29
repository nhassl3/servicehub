<?php $__env->startSection('title', "Отзывы"); ?>

<?php $__env->startSection('css'); ?>
<style>
	main {
		margin: 3em 0;
		padding: 0;
		min-width: 100%;
		max-height: 100%;
	}

	.faded-text:last-child {
		margin-top: 1rem;
	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<article class="cards">
	<?php echo $__env->make('layouts.cart-view', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</article>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/nhassl3/projects/servicehub/resources/views/reviews.blade.php ENDPATH**/ ?>