<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Helper;

use Numbers\Users\Users\Model\User\Owner\Types;

class OwnerTypes
{
    /**
     * Get all owner types by weight
     *
     * @return array
     */
    public static function getAllOwnerTypes(): array
    {
        $result = [];
        $owners = Types::getStatic([
            'where' => [
                'um_ownertype_tenant_id' => \Tenant::id(),
            ],
            'orderby' => ['um_ownertype_weight' => 'DESC'],
            'pk' => ['um_ownertype_code'],
        ]);
        foreach ($owners as $k => $v) {
            if (\Can::userIsOwner($v['um_ownertype_code'])) {
                $result[$k] = $v;
            }
        }
        return $result;
    }

    /**
     * Get highest owner type
     *
     * @return array
     */
    public static function getHighestOwnerType(): array
    {
        return current(self::getAllOwnerTypes()) ?? [];
    }
}
