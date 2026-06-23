<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

use Numbers\Users\Users\Controller\Register;

Route::uri('U/M Register (Advanced)', '/register', 'Index', Route::HTTP_REQUEST_METHOD_ALL, [Register::class, 'Index'])
->acl('Public')
->acl('Not Authorized')
->acl('Route Alias:um.users.register.advanced');

Route::uri('U/M Register (Simple)', '/register2', 'Simple', Route::HTTP_REQUEST_METHOD_ALL, [Register::class, 'Simple'])
->acl('Public')
->acl('Not Authorized')
->acl('Route Alias:um.users.register.simple');
