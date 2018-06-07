<?php $__env->startSection('content'); ?>
    <div class="row">

        <?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card" style="width:300px">
                <a href="<?php echo e(route('frontend.report.show' , [$clid->id] )); ?>"><img src="<?php echo e('/storage/childs/'.$clid->photo); ?>" alt="Avatar" style="height:200px"> </a>
                <div class="container">
                    <h3><?php echo e($clid->name); ?></h3>
                    <br>

                    <span class="card-footer"><?php echo e($clid->reporter_phone_number); ?>  رقم المبلغ </span>

                </div>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>