<?php

Breadcrumbs::for('admin.comment.comment.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Comments Managment', route('admin.comment.comment.index'));
});

Breadcrumbs::for('admin.comment.comment.create', function ($trail) {
    $trail->parent('admin.comment.comment.index');
    $trail->push('Create Comment', route('admin.comment.comment.create'));
});

Breadcrumbs::for('admin.comment.comment.edit', function ($trail, $id) {
    $trail->parent('admin.comment.comment.index');
    $trail->push('Edit Comment', route('admin.comment.comment.edit', $id));
});


Breadcrumbs::for('admin.comment.comment.show', function ($trail, $id) {
    $trail->parent('admin.comment.comment.index');
    $trail->push('View Comment', route('admin.comment.comment.show', $id));
});