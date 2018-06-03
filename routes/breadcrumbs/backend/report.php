<?php

Breadcrumbs::for('admin.report.report.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Reports Managment', route('admin.report.report.index'));
});

Breadcrumbs::for('admin.report.report.create', function ($trail) {
    $trail->parent('admin.report.report.index');
    $trail->push('Create Report', route('admin.report.report.create'));
});

Breadcrumbs::for('admin.report.report.edit', function ($trail, $id) {
    $trail->parent('admin.report.report.index');
    $trail->push('Edit Report', route('admin.report.report.edit', $id));
});


Breadcrumbs::for('admin.report.report.show', function ($trail, $id) {
    $trail->parent('admin.report.report.index');
    $trail->push('View Report', route('admin.report.report.show', $id));
});