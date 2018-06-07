<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">☰</button>
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler sidebar-minimizer d-md-down-none" type="button">☰</button>

    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
            <a class="nav-link" href="<?php echo e(route('frontend.index')); ?>"><i class="icon-home"></i></a>
        </li>

        <li class="nav-item px-3">
            <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('navs.frontend.dashboard')); ?></a>
        </li>

        <?php if(config('locale.status') && count(config('locale.languages')) > 1): ?>
            <li class="nav-item px-3 dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="d-md-down-none"><?php echo e(__('menus.language-picker.language')); ?> (<?php echo e(strtoupper(app()->getLocale())); ?>)</span>
                </a>

                <?php echo $__env->make('includes.partials.lang', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </li>
        <?php endif; ?>
    </ul>

    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#"><i class="icon-bell"></i><span class="badge badge-pill badge-info">0</span></a>
        </li>
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#"><i class="icon-list"></i></a>
        </li>
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="<?php echo e($logged_in_user->picture); ?>" class="img-avatar" alt="<?php echo e($logged_in_user->email); ?>">
                <span class="d-md-down-none"><?php echo e($logged_in_user->full_name); ?></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>Heading</strong>
                </div>
                <a class="dropdown-item" href="#"><i class="fas fa-link"></i> Link<span class="badge badge-primary">0</span></a>
                <a class="dropdown-item" href="#"><i class="fas fa-link"></i> Link</a>

                <div class="dropdown-header text-center">
                    <strong>Heading</strong>
                </div>
                <a class="dropdown-item" href="#"><i class="fas fa-link"></i> Link</a>
                <a class="dropdown-item" href="#"><i class="fas fa-link"></i> Link</a>
                <a class="dropdown-item" href="<?php echo e(route('frontend.auth.logout')); ?>"><i class="fas fa-lock"></i> <?php echo e(__('navs.general.logout')); ?></a>
            </div>
        </li>
    </ul>

    <button class="navbar-toggler aside-menu-toggler" type="button">☰</button>
</header>