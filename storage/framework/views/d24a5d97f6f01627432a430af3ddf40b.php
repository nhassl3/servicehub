<?php $__env->startSection('title', 'Оформление заказа'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/style-market.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset("css/style-gocheckout-section.css")); ?>">
<!-- DEVELOP -->
<link rel="stylesheet" href="<?php echo e(asset('css/style-in-develop.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('in-develop', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<!-- <?php echo $__env->make('gocheckout-section', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/nhassl3/projects/servicehub/resources/views/gocheckout.blade.php ENDPATH**/ ?>