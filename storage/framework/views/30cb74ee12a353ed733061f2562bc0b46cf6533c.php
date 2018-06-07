<?php $__env->startSection('title', app_name() . ' | Reports'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
<?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card" style="width:300px">
<img src="<?php echo e($report->photo); ?>" alt="Avatar" style="height:200px">
  <div class="container">
    <b><?php echo e($report->name); ?></b>
    <hr>
    <a href="/reports/<?php echo e($report->id); ?>"  name="view" > Read More</a>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>