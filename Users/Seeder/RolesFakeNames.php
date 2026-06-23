<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Seeder;

use Numbers\FakeNames\FakeNames\FakerFactory;

class RolesFakeNames
{
    public static function generate(string $code): array
    {
        $names = FakerFactory::create();
        $result = [
            'um_role_tenant_id' => \Tenant::id(),
            'um_role_code' => $code,
            'um_role_type_id' => 20,
            'um_role_department_id' => null,
            'um_role_name' => $names->name__suffix_Role,
            'um_role_icon' => null,
            'um_role_global' => 0,
            'um_role_super_admin' => 0,
            'um_role_weight' => 5,
            'um_role_inactive' => 0,
            '\Numbers\Users\Users\Model\Role\Organizations' => [
                [
                    'um_rolorg_organization_id' => $names->getStoredModelValues('\Numbers\Users\Organizations\Model\Organizations', 'id', 1),
                    'um_rolorg_inactive' => 0,
                ]
            ]
        ];
        return $result;
    }
}
