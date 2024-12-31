<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

use Numbers\Users\Users\Controller\Login;
use Numbers\Users\Users\Controller\Logout;
use Numbers\Users\Users\Controller\Logout\Confirmed;
use Numbers\Users\Users\Controller\Users;

Route::uri('U/M Users: Login', '/Login', 'Index', ['GET', 'POST'], [Login::class, 'Index'])
    ->acl('Public')
    ->acl('Not Authorized');

Route::uri('U/M Users: Logout', '/Logout', 'Index', ['GET', 'POST'], [Logout::class, 'Index'])
    ->acl('Public')
    ->acl('Authorized');

Route::uri('U/M Users: Logout (Confirmed)', '/Logout/Confirmed', 'Index', ['GET'], [Confirmed::class, 'Index'])
    ->acl('Public');

Route::group('Footer: User Management', null, function () {
    Route::footer('Users', 'fas fa-users', ['UM', 'User Management'], '/Numbers/Users/Users/Controller/Users', 'Index', [
        Users::class,
        'Index',
        'List_View'
    ]);
    Route::footer('New User', 'fas fa-users', ['UM', 'User Management'], '/Numbers/Users/Users/Controller/Users', 'Edit', [
        Users::class,
        'Edit',
        'Record_New'
    ]);
})->acl('As Controller')->options(['group_order' => PHP_INT_MAX - 1000]);
