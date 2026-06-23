<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Data\Preset;

use Object\Import;

class ImportWeightedAccesses extends Import
{
    public $data = [
        'external_resource_actions1' => [
            'options' => [
                'pk' => ['um_weiaccess_tenant_id', 'um_weiaccess_id'],
                'model' => '\Numbers\Users\Users\Model\Resource\WeightedAccesses',
                'method' => 'save'
            ],
            'data' => [
                [
                    'um_weiaccess_tenant_id' => null,
                    'um_weiaccess_id' => 1000,
                    'um_weiaccess_name' => 'Limited Users',
                    'um_weiaccess_icon' => '',
                    'um_weiaccess_description' => null,
                    'um_weiaccess_inactive' => 0
                ],
                [
                    'um_weiaccess_tenant_id' => null,
                    'um_weiaccess_id' => 5000,
                    'um_weiaccess_name' => 'Regular Users',
                    'um_weiaccess_icon' => '',
                    'um_weiaccess_description' => null,
                    'um_weiaccess_inactive' => 0
                ],
                [
                    'um_weiaccess_tenant_id' => null,
                    'um_weiaccess_id' => 10000,
                    'um_weiaccess_name' => 'Power Users',
                    'um_weiaccess_icon' => '',
                    'um_weiaccess_description' => null,
                    'um_weiaccess_inactive' => 0
                ],
                [
                    'um_weiaccess_tenant_id' => null,
                    'um_weiaccess_id' => 25000,
                    'um_weiaccess_name' => 'Administrators',
                    'um_weiaccess_icon' => '',
                    'um_weiaccess_description' => null,
                    'um_weiaccess_inactive' => 0
                ],
                [
                    'um_weiaccess_tenant_id' => null,
                    'um_weiaccess_id' => 100000,
                    'um_weiaccess_name' => 'Super Users',
                    'um_weiaccess_icon' => '',
                    'um_weiaccess_description' => null,
                    'um_weiaccess_inactive' => 0
                ],
            ],
        ],
    ];
}
