<?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $isReviewPage = isset($review['rating']) && isset($review['comment']); ?>
<section class="card" data-product_id='<?php echo e($key); ?>' id='clickable'>
	<?php if($isReviewPage): ?><h4 class='bright-text'><?php echo e($review['title']); ?></h4><?php endif; ?>
	<img src="<?php echo e(asset($review['image_url'])); ?>" class='img-card' alt="<?php echo e($review['title']); ?>">
	<div class="left-corner-desc roboto-text">
		<?php if($isReviewPage): ?>
		<div class="faded-text">Рейтинг:&nbsp;<?php echo e($review['rating']); ?></div>
		<div class="faded-text"><?php echo e($review['comment']); ?></div>
		<?php else: ?>
		<div class="bright-text"><?php echo e($review['title']); ?></div>
		<div class="faded-text">₽ <?php echo e($review['discount_price']); ?> RUB</div>
		<?php endif; ?>
	</div>
</section>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/nhassl3/projects/servicehub/resources/views/layouts/cart-view.blade.php ENDPATH**/ ?>