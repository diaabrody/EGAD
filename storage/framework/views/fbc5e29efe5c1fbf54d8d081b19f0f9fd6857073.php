<?php $__env->startSection('title', app_name() . ' | '.__('labels.frontend.auth.login_box_title')); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center align-items-center">
    <div class="col col-sm-8 align-self-center">
        <div class="card">
            <div class="card-header">
                <strong>
                    <?php echo e(__('labels.frontend.auth.login_box_title')); ?>

                </strong>
            </div><!--card-header-->

            <div class="card-body">
                <?php echo e(html()->form('POST', route('frontend.auth.login.post'))->open()); ?>

                 
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                        <?php echo e(html()->label(__('Email or Phone'))->for('email')); ?>

                            
                        <?php echo e(html()->text('email')
                                        ->class('form-control')
                                        ->placeholder(__('Email or Phone'))
                                        ->attribute('maxlength', 191)
                                        ->required()); ?>

                        </div><!--form-group-->
                    </div><!--col-->
                </div><!--row-->

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <?php echo e(html()->label(__('validation.attributes.frontend.password'))->for('password')); ?>


                            <?php echo e(html()->password('password')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.frontend.password'))
                                ->required()); ?>

                        </div><!--form-group-->
                    </div><!--col-->
                </div><!--row-->

               <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="checkbox">
                                 <?php echo e(html()->label(html()->checkbox('remember', true, 1) . ' ' . __('labels.frontend.auth.remember_me'))->for('remember')); ?>

                            </div>
                        </div><!--form-group-->
                    </div><!--col-->
                </div><!--row-->

                <div class="row">
                    <div class="col">
                        <div class="form-group clearfix">
                            <?php echo e(form_submit(__('labels.frontend.auth.login_button'))); ?>

                        </div><!--form-group-->
                    </div><!--col-->
                </div><!--row-->

                <div class="row">
                    <div class="col">
                        <div class="form-group text-right">
                            <a href="<?php echo e(route('frontend.auth.password.reset')); ?>"><?php echo e(__('labels.frontend.passwords.forgot_password')); ?></a>
                        </div><!--form-group-->
                    </div><!--col-->
                </div><!--row-->
                <?php echo e(html()->form()->close()); ?>



            <div class="row">
                <div class="col">
                    <div class="text-center">
                         <?php echo $socialiteLinks; ?>

                    </div>
                </div><!--col-->
            </div><!--row-->
            </div><!--card body-->
            </div><!--card-->
        </div><!-- col-md-8 -->
    </div><!-- row -->
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>