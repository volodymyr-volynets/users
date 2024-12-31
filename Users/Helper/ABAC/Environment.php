<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Helper\ABAC;

use Numbers\Users\Users\DataSource\User\UserToUser;

class Environment
{
    /**
     * Get user and children
     */
    public function getUserWithChildren(int $user_id = 0)
    {
        if (empty($user_id)) {
            $user_id = \User::id();
        }
        $model = new UserToUser();
        return $model->get([
            'where' => [
                'user_id' => $user_id
            ]
        ]);
    }
}
