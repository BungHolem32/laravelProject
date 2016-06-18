<?php $__env->startSection('title','Home Page'); ?>


<?php $__env->startSection('content'); ?>

<h2>My first page </h2>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('_layout._html', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>