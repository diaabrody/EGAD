<?php

Breadcrumbs::for('admin.report.report.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('menus.backend.access.roles.management'), route('admin.report.report.index'));
});

Breadcrumbs::for('admin.report.report.create', function ($trail) {
    $trail->parent('admin.report.report.index');
    $trail->push(__('menus.backend.access.roles.create'), route('admin.report.report.create'));
});

Breadcrumbs::for('admin.report.report.edit', function ($trail, $id) {
    $trail->parent('admin.report.report.index');
    $trail->push(__('menus.backend.access.roles.edit'), route('admin.report.report.edit', $id));
});