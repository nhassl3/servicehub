<?php $__env->startSection('title', 'Стать продавцом'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset("css/style-market.css")); ?>">
<!-- DEVELOP STYLE -->
<link rel="stylesheet" href="<?php echo e(asset("css/style-in-develop.css")); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('in-develop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/nhassl3/projects/servicehub/resources/views/create-seller.blade.php ENDPATH**/ ?>