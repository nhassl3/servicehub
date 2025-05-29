<?php
$totalPages = ceil($countProducts / $offset);
$showPages = 3;
?>



<?php $__env->startSection('title', 'Продукты'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/style-market.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="setter-products">
	<article class="categories">
		<header>
			<h2 class="h-2"><a class='without-decor color-inh' href='/market'>Продукты</a></h2>
			<div class="categories-listing">
				<ul>
					<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php
					$currentCategory = isset($slug) ? $slug : 'all';
					$isActive = ($key === $currentCategory) ? 'bold' : '';
					$link = ($key === 'all') ? "/market" : "/market/$key";
					?>
					<li><a href="<?php echo e($link); ?>" class="products-category-link <?php echo e($isActive); ?>"><?php echo e($value['name']); ?></a></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
		</header>
	</article>
	<article class="offset-select">
		<div class="offset">
			<button class="offset-btn">
				12
				<div class="ag94-a"></div>
			</button>
			<button class="offset-btn">
				24
				<div class="ag94-a"></div>
			</button>
			<button class="offset-btn">
				48
				<div class="ag94-a"></div>
			</button>
		</div>
	</article>
</div>

<article class="cards">
	<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<section class='card' data-product_id='<?php echo e($product['id']); ?>' id='clickable'>
		<img src='<?php echo e(asset($product['image_url'])); ?>' class='img-card'>
		<div class='left-corner-desc roboto-text'>
			<h4 class='bright-text'><?php echo e($product['title']); ?></h4>
			<span class='faded-text'>₽ <?php echo e($product['discount_price']); ?> RUB</span>
		</div>
	</section>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</article>

<?php if($totalPages >= 1): ?>
<article class="pagination">
	<div class="paginate">
		<ul>
			<?php for($i = 1; $i <= $totalPages; $i++): ?>
				<?php if($i==1 || $i==$totalPages || ($i>= $page - $showPages && $i <= $page + $showPages)): ?>
					<li class="offset-btn <?php echo e($i == $page ? 'current' : ''); ?>">
					<?php echo e($i); ?>

					<div class="ag94-a"></div>
					</li>
					<?php elseif($i == $page - ($showPages + 1) || $i == $page + ($showPages + 1)): ?>
					...
					<?php endif; ?>
					<?php endfor; ?>
		</ul>
	</div>
</article>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src='<?php echo e(asset("js/script.js")); ?>'></script>
<script src='<?php echo e(asset("js/offset.js")); ?>'></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/nhassl3/projects/servicehub/resources/views/market.blade.php ENDPATH**/ ?>