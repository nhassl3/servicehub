<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<?php echo $__env->yieldContent("meta"); ?>
	<title>ServiceHub | <?php echo $__env->yieldContent('title'); ?></title>
	<link rel="stylesheet" href="<?php echo e(asset("css/style.css")); ?>">
	<?php echo $__env->yieldContent('css'); ?>
	<?php echo $__env->make('layouts.connect_favicon', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>

<body>
	<?php echo $__env->make('layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

	<main>
		<?php echo $__env->yieldContent('content'); ?>
	</main>

	<?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
	<script src='<?php echo e(asset("js/auth-visible.js")); ?>'></script>
	<?php echo $__env->yieldContent('scripts'); ?>
</body>

</html><?php /**PATH /home/nhassl3/projects/servicehub/resources/views/layouts/master.blade.php ENDPATH**/ ?>