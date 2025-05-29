<?php $__env->startSection("title", "Страница не найдена"); ?>

<?php $__env->startSection("css"); ?>
<link rel="stylesheet" href="<?php echo e(asset("css/style-error.css")); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 class="page-error">404</h2>
<div class='page-error-text'>Страница не найдена!</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/nhassl3/projects/servicehub/resources/views/errors/404.blade.php ENDPATH**/ ?>