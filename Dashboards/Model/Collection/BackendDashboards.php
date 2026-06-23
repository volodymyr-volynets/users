<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Dashboards\Model\Collection;

use Object\Collection;

class BackendDashboards extends Collection
{
    public $data = [
        'name' => 'D9 Backend Dashboards',
        'model' => '\Numbers\Users\Dashboards\Model\Backend\Dashboards',
        'pk' => ['d9_backdash_tenant_id', 'd9_backdash_code'],
        'details' => [
            '\Numbers\Users\Dashboards\Model\Backend\Dashboard\Parameters' => [
                'name' => 'D9 Backend Dashboard Parameters',
                'pk' => ['d9_backdshpar_tenant_id', 'd9_backdshpar_d9_backdash_code', 'd9_backdshpar_code'],
                'type' => '1M',
                'map' => ['d9_backdash_tenant_id' => 'd9_backdshpar_tenant_id', 'd9_backdash_code' => 'd9_backdshpar_d9_backdash_code']
            ],
        ]
    ];
}
