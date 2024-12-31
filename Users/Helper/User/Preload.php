<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Helper\User;

use Numbers\Users\Users\DataSource\Login;

class Preload
{
    /**
     * Preload one user
     *
     * @param int $user_id
     */
    public static function preloadOneUser(int $user_id)
    {
        if (!empty(\User::$cached_users[$user_id])) {
            return;
        }
        $all_users = Login::getStatic([
            'where' => [
                'user_ids' => [$user_id],
            ],
            'pk' => ['id'],
            'single_row' => false,
        ]);
        \User::$cached_users = array_merge_hard(\User::$cached_users, $all_users);
    }
}
