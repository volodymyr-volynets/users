<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Ingestions\Helper;

use Helper\Date;

class Locks
{
    /**
     * Is locked
     *
     * @param string $link
     * @param int $uid
     * @param string $interval
     * @return bool
     */
    public static function isLocked(string $link, int $uid, string $interval = '-30 days'): bool
    {
        $result = \Numbers\Users\Widgets\Ingestions\Model\Locks::getStatic([
            'where' => [
                'wg_emailinglock_link' => $link,
                'wg_emailinglock_uid' => $uid,
                'wg_emailinglock_timestamp;>' => Date::addInterval(\Format::now('date'), $interval),
            ],
            'pk' => null,
        ]);
        return !empty($result[0]);
    }

    /**
     * Lock
     *
     * @param string $link
     * @param int $uid
     * @return bool
     */
    public static function lock(string $link, int $uid): bool
    {
        $result = \Numbers\Users\Widgets\Ingestions\Model\Locks::collectionStatic()->merge([
            'wg_emailinglock_link' => $link,
            'wg_emailinglock_uid' => $uid,
            'wg_emailinglock_timestamp' => \Format::now('timestamp'),
        ]);
        return $result['success'];
    }
}
