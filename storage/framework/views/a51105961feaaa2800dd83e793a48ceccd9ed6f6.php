<?php $__env->startSection('title', app_name() . ' | ' . __('strings.backend.dashboard.title')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong><?php echo e(__('strings.backend.dashboard.welcome')); ?> <?php echo e($logged_in_user->name); ?>!</strong>
                </div><!--card-header-->
                <div class="card-block">
                    <?php echo __('strings.backend.welcome'); ?>

                </div><!--card-block-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>