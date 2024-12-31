<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Collection;

use Object\Collection;

class OwnerTypes extends Collection
{
    public $data = [
        'name' => 'Owner Types',
        'model' => '\Numbers\Users\Users\Model\User\Owner\Types',
        'details' => [
            '\Numbers\Users\Users\Model\User\Owner\Type\Roles' => [
                'name' => 'Owner Roles',
                'pk' => ['um_ownertprole_tenant_id', 'um_ownertprole_ownertype_id', 'um_ownertprole_role_id'],
                'type' => '1M',
                'map' => ['um_ownertype_tenant_id' => 'um_ownertprole_tenant_id', 'um_ownertype_id' => 'um_ownertprole_ownertype_id'],
            ],
            '\Numbers\Users\Users\Model\User\Owner\Type\Organizations' => [
                'name' => 'Owner Organizations',
                'pk' => ['um_ownertporg_tenant_id', 'um_ownertporg_ownertype_id', 'um_ownertporg_organization_id'],
                'type' => '1M',
                'map' => ['um_ownertype_tenant_id' => 'um_ownertporg_tenant_id', 'um_ownertype_id' => 'um_ownertporg_ownertype_id'],
            ]
        ]
    ];
}
