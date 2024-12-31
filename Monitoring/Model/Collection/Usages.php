<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Monitoring\Model\Collection;

use Object\Collection;

class Usages extends Collection
{
    public $data = [
        'name' => 'Usages',
        'model' => '\Numbers\Users\Monitoring\Model\Usages',
        'details' => [
            '\Numbers\Users\Monitoring\Model\Usage\Actions' => [
                'name' => 'Usage Actions',
                'pk' => ['sm_monusgact_tenant_id', 'sm_monusgact_usage_id', 'sm_monusgact_usage_code'],
                'type' => '1M',
                'map' => ['sm_monusage_tenant_id' => 'sm_monusgact_tenant_id', 'sm_monusage_id' => 'sm_monusgact_usage_id']
            ]
        ]
    ];
}
