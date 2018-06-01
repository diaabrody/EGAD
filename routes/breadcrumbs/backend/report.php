<?php

Breadcrumbs::for('admin.report.report.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.access.roles.management'), route('admin.report.report.index'));
});
