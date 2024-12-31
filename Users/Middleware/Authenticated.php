<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Middleware;

use Object\Middleware;
use Helper\Constant\HTTPConstants;

class Authenticated extends Middleware
{
    /**
     * Run
     *
     * @param \Request $request
     * @param mixed $response
     * @param array $options
     * @return bool|array
     */
    public function run(\Request $request, mixed $response, array $options = []): bool|array
    {
        return [
            'success' => \User::authorized(),
            'error' => !\User::authorized() ? [loc('NF.Message.Unauthorized', 'Unauthorized!')] : [],
            'http_status_code' => \User::authorized() ? HTTPConstants::Status200OK : HTTPConstants::Status401Unauthorized,
        ];
    }
}
