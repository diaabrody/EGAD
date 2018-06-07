<?php $__env->startSection('content'); ?>
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-tachometer-alt"></i> <?php echo e(__('navs.frontend.dashboard')); ?>

                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    <div class="row">
                        <div class="col col-sm-4 order-1 order-sm-2  mb-4">
                            <div class="card mb-4 bg-light">
                                <img class="card-img-top" src="<?php echo e($logged_in_user->picture); ?>" alt="Profile Picture">

                                <div class="card-body">
                                    <h4 class="card-title">
                                        <?php echo e($logged_in_user->name); ?><br/>
                                    </h4>

                                    <p class="card-text">
                                        <small>
                                            <i class="fas fa-envelope"></i> <?php echo e($logged_in_user->email); ?><br/>
                                            <i class="fas fa-calendar-check"></i> <?php echo e(__('strings.frontend.general.joined')); ?> <?php echo e($logged_in_user->created_at->timezone(get_user_timezone())->format('F jS, Y')); ?>

                                        </small>
                                    </p>

                                    <p class="card-text">

                                        <a href="<?php echo e(route('frontend.user.account')); ?>" class="btn btn-info btn-sm mb-1">
                                            <i class="fas fa-user-circle"></i> <?php echo e(__('navs.frontend.user.account')); ?>

                                        </a>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view backend')): ?>
                                            &nbsp;<a href="<?php echo e(route ('admin.dashboard')); ?>" class="btn btn-danger btn-sm mb-1">
                                                <i class="fas fa-user-secret"></i> <?php echo e(__('navs.frontend.user.administration')); ?>

                                            </a>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header">Header</div>
                                <div class="card-body">
                                    <h4 class="card-title">Info card title</h4>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div><!--card-->
                        </div><!--col-md-4-->
                      

                        <div class="col-md-6 order-2 order-sm-1">
                           
                            <div class="row">
                                <div class="col">
                                <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Report
                                        </div><!--card-header-->
                                        <div class="card-body">
                                            <img src="<?php echo e($report->photo); ?>" alt="Avatar" style="height:200px">
                                            <br>
                                            <b><?php echo e($report->name); ?></b>
                                            <br>
                                            <a href="reports/<?php echo e($report->id); ?>"  name="view" > Read More </a>
                                        </div><!--card-body-->
                                    </div><!--card-->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                </div><!--col-md-4-->
                                
                            </div><!--row-->

                            <div class="row">
                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->

                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->

                                <div class="w-100"></div>

                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->

                                <div class="col">
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Item
                                        </div><!--card-header-->

                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                        </div><!--card-body-->
                                    </div><!--card-->
                                </div><!--col-md-6-->
                            </div><!--row-->
                        </div><!--col-md-8-->
                    </div><!-- row -->
                </div> <!-- card-body -->
            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>