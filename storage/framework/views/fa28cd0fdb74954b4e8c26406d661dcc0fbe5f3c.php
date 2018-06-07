<!DOCTYPE html>
<?php if (\Illuminate\Support\Facades\Blade::check('langrtl')): ?>
    <html lang="<?php echo e(app()->getLocale()); ?>" dir="rtl">
<?php else: ?>
    <html lang="<?php echo e(app()->getLocale()); ?>">
<?php endif; ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', app_name()); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Laravel 5 Boilerplate'); ?>">
    <meta name="author" content="<?php echo $__env->yieldContent('meta_author', 'Anthony Rappa'); ?>">
    <?php echo $__env->yieldContent('meta'); ?>

    
    <?php echo $__env->yieldPushContent('before-styles'); ?>

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    <?php echo e(style(mix('css/backend.css'))); ?>


    <?php echo $__env->yieldPushContent('after-styles'); ?>
</head>

<body class="<?php echo e(config('backend.body_classes')); ?>">
    <?php echo $__env->make('backend.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="app-body">
        <?php echo $__env->make('backend.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <main class="main">
            <?php echo $__env->make('includes.partials.logged-in-as', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo Breadcrumbs::render(); ?>


            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="content-header">
                        <?php echo $__env->yieldContent('page-header'); ?>
                    </div><!--content-header-->

                    <?php echo $__env->make('includes.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo $__env->yieldContent('content'); ?>
                </div><!--animated-->
            </div><!--container-fluid-->
        </main><!--main-->

        <?php echo $__env->make('backend.includes.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div><!--app-body-->

    <?php echo $__env->make('backend.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Scripts -->
    <?php echo $__env->yieldPushContent('before-scripts'); ?>
    <?php echo script(mix('js/backend.js')); ?>

    <?php echo $__env->yieldPushContent('after-scripts'); ?>
</body>
</html>
