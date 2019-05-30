<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

/*
 * Roles Breadcrumbs
 * 
  */

Breadcrumbs::for('roles.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('strings.menus.roles.management'), route('roles.index'));
});

Breadcrumbs::for('role.create', function ($trail) {
    $trail->parent('roles.index');
    $trail->push(__('strings.menus.roles.create'), route('role.create'));
});

Breadcrumbs::for('role.edit', function ($trail, $role) {
    $trail->parent('roles.index');
    $trail->push(__('strings.menus.roles.edit'), route('role.edit', $role));
});

/*
 * Users Breadcrumbs
 * 
  */

Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('strings.menus.users.management'), route('users.index'));
});

Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users.index');
    $trail->push(__('strings.menus.users.create'), route('users.create'));
});

Breadcrumbs::for('users.edit', function ($trail, $user) {
    $trail->parent('users.index');
    $trail->push(__('strings.menus.users.edit'), route('users.edit', $user));
});

Breadcrumbs::for('users.show', function ($trail, $user) {
    $trail->parent('users.index');
    $trail->push(__('strings.menus.users.show'), route('users.show', $user));
});

/*
 * Documents Breadcrumbs
 * 
  */

Breadcrumbs::for('documents-index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('strings.menus.documents.management'), route('documents-index'));
});

Breadcrumbs::for('documents-uploads', function ($trail) {
    $trail->parent('documents-index');
    $trail->push(__('strings.menus.documents.uploads'), route('documents-uploads'));
});

Breadcrumbs::for('documents-downloads', function ($trail) {
    $trail->parent('documents-index');
    $trail->push(__('strings.menus.documents.downloads'), route('documents-downloads'));
});

Breadcrumbs::for('upload-document', function ($trail) {
    $trail->parent('documents-index');
    $trail->push(__('strings.menus.documents.upload-document'), route('upload-document'));
});

Breadcrumbs::for('search-documents', function ($trail) {
    $trail->parent('documents-index');
    $trail->push(__('strings.menus.documents.search-document'), route('search-documents'));
});

/*
 * Events Breadcrumbs
 * 
  */

Breadcrumbs::for('events.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('strings.menus.events.management'), route('events.index'));
});

Breadcrumbs::for('events.create', function ($trail) {
    $trail->parent('events.index');
    $trail->push(__('strings.menus.events.create'), route('events.create'));
});