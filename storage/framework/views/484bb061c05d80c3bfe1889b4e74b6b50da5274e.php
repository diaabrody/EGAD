<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                <?php echo e(__('menus.backend.sidebar.general')); ?>

            </li>

            <li class="nav-item">
                <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/dashboard'))); ?>" href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-speedometer"></i> <?php echo e(__('menus.backend.sidebar.dashboard')); ?></a>
            </li>

            <li class="nav-title">
                <?php echo e(__('menus.backend.sidebar.system')); ?>

            </li>

            <?php if($logged_in_user->isAdmin()): ?>
                <li class="nav-item nav-dropdown <?php echo e(active_class(Active::checkUriPattern('admin/auth*'), 'open')); ?>">
                    <a class="nav-link nav-dropdown-toggle <?php echo e(active_class(Active::checkUriPattern('admin/auth*'))); ?>" href="#">
                        <i class="icon-user"></i> <?php echo e(__('menus.backend.access.title')); ?>


                        <?php if($pending_approval > 0): ?>
                            <span class="badge badge-danger"><?php echo e($pending_approval); ?></span>
                        <?php endif; ?>
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/auth/user*'))); ?>" href="<?php echo e(route('admin.auth.user.index')); ?>">
                                <?php echo e(__('labels.backend.access.users.management')); ?>


                                <?php if($pending_approval > 0): ?>
                                    <span class="badge badge-danger"><?php echo e($pending_approval); ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/auth/role*'))); ?>" href="<?php echo e(route('admin.auth.role.index')); ?>">
                                <?php echo e(__('labels.backend.access.roles.management')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/report*'))); ?>" href="<?php echo e(route('admin.report.report.index')); ?>">
                                    Report Management
                                </a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/comment*'))); ?>" href="<?php echo e(route('admin.comment.comment.index')); ?>">
                                        Comment Management
                                    </a>
                                </li>
                    </ul>
                </li>
            <?php endif; ?>

            <li class="nav-item nav-dropdown <?php echo e(active_class(Active::checkUriPattern('admin/log-viewer*'), 'open')); ?>">
                <a class="nav-link nav-dropdown-toggle <?php echo e(active_class(Active::checkUriPattern('admin/log-viewer*'))); ?>" href="#">
                    <i class="icon-list"></i> <?php echo e(__('menus.backend.log-viewer.main')); ?>

                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/log-viewer'))); ?>" href="<?php echo e(route('log-viewer::dashboard')); ?>">
                            <?php echo e(__('menus.backend.log-viewer.dashboard')); ?>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/log-viewer/logs*'))); ?>" href="<?php echo e(route('log-viewer::logs.list')); ?>">
                            <?php echo e(__('menus.backend.log-viewer.logs')); ?>

                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div><!--sidebar-->