<?php

\Route::uri('U/M Users: Login', '/Login', 'Index', ['GET', 'POST'], [\Numbers\Users\Users\Controller\Login::class, 'Index'])
    ->acl('Public')
    ->acl('Not Authorized');

\Route::uri('U/M Users: Logout', '/Logout', 'Index', ['GET', 'POST'], [\Numbers\Users\Users\Controller\Logout::class, 'Index'])
    ->acl('Public')
    ->acl('Authorized');

\Route::uri('U/M Users: Logout (Confirmed)', '/Logout/Confirmed', 'Index', ['GET'], [\Numbers\Users\Users\Controller\Logout\Confirmed::class, 'Index'])
    ->acl('Public');

\Route::group('Footer: User Management', null, function() {
    \Route::footer('Users', 'fas fa-users', ['UM', 'User Management'], '/Numbers/Users/Users/Controller/Users', 'Index', [
        \Numbers\Users\Users\Controller\Users::class,
        'Index',
        'List_View'
    ]);
    \Route::footer('New User', 'fas fa-users', ['UM', 'User Management'], '/Numbers/Users/Users/Controller/Users', 'Edit', [
        \Numbers\Users\Users\Controller\Users::class,
        'Edit',
        'Record_New'
    ]);
})->acl('As Controller')->options(['group_order' => PHP_INT_MAX - 1000]);