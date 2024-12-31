<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

use Numbers\Users\OAuth\Controller\OAuthTokenSignIn;

Route::uri('O/A OAuth: Token Sign In', '/OAuth/TokenSignIn', 'Index', ['GET', 'POST', 'PUT'], [OAuthTokenSignIn::class, 'Index'])
    ->acl('Public,Authorized');

Route::uri('O/A OAuth: Token Callback', '/OAuth/TokenSignIn', 'Callback', ['GET', 'POST', 'PUT'], [OAuthTokenSignIn::class, 'Callback'])
    ->acl('Public,Authorized');
