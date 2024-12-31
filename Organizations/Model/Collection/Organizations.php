<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Collection;

use Object\Collection;

class Organizations extends Collection
{
    public $data = [
        'name' => 'Organizations',
        'model' => '\Numbers\Users\Organizations\Model\Organizations',
        'details' => [
            '\Numbers\Users\Organizations\Model\Organization\Type\Map' => [
                'name' => 'Types',
                'pk' => ['on_orgtpmap_tenant_id', 'on_orgtpmap_organization_id', 'on_orgtpmap_type_code'],
                'type' => '1M',
                'map' => ['on_organization_tenant_id' => 'on_orgtpmap_tenant_id', 'on_organization_id' => 'on_orgtpmap_organization_id']
            ],
            '\Numbers\Users\Organizations\Model\Organization\BusinessHours' => [
                'name' => 'Business Hours',
                'pk' => ['on_orgbhour_tenant_id', 'on_orgbhour_organization_id', 'on_orgbhour_day_id'],
                'type' => '1M',
                'map' => ['on_organization_tenant_id' => 'on_orgbhour_tenant_id', 'on_organization_id' => 'on_orgbhour_organization_id'],
            ]
        ]
    ];
}
