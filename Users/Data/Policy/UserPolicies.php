<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Data\Policy;

use Object\Import;
use Numbers\Backend\System\Policies\Model\Types;

class UserPolicies extends Import
{
    public $data = [
        'policies' => [
            'options' => [
                'pk' => ['sm_policy_tenant_id', 'sm_policy_code'],
                'model' => '\Numbers\Backend\System\Policies\Model\Policies',
                'method' => 'save',
                'process_column_method' => 'self::internal',
            ],
            'data' => [
                [
                    'sm_policy_tenant_id' => '::preserve::1',
                    'sm_policy_code' => 'UM::MODULE_GLOBAL',
                    'sm_policy_name' => 'U/M Module Access (Global)',
                    'sm_policy_sm_poltype_code' => 'SM::PAGE_ACCESS_GROUP',
                    'sm_policy_description' => 'SM::MODULES',
                    'sm_policy_module_code' => 'UM',
                    'sm_policy_external_json' => <<<STR
{
    "Rules": [
        {
            "Operator": "AND",
            "module_codes": [
                "UM",
                "SM-UM"
            ]
        }
    ],
    "Action": "Allow",
    "Effective": "2024-12-01"
}
STR,
                    'sm_policy_internal_json' => null,
                    'sm_policy_global' => 1,
                    'sm_policy_weight' => 50000,
                    'sm_policy_inactive' => 0,
                ],
            ],
        ],
        'policy_groups' => [
            'options' => [
                'pk' => ['sm_polgroup_tenant_id', 'sm_polgroup_id'],
                'model' => '\Numbers\Backend\System\Policies\Model\Collection\Groups',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_polgroup_tenant_id' => '::preserve::1',
                    'sm_polgroup_id' => 1,
                    'sm_polgroup_code' => 'UM::MODULE_GLOBAL',
                    'sm_polgroup_name' => 'U/M Module (Global)',
                    'sm_polgroup_description' => '',
                    'sm_polgroup_module_code' => 'UM',
                    'sm_polgroup_global' => 1,
                    'sm_polgroup_weight' => 50000,
                    'sm_polgroup_inactive' => 0,
                    '\Numbers\Backend\System\Policies\Model\Group\Policies' => [
                        [
                            'sm_polgropolicy_sm_policy_tenant_id' => 1,
                            'sm_polgropolicy_sm_policy_code' => 'UM::MODULE_GLOBAL',
                            'sm_polgropolicy_inactive' => 0,
                        ],
                    ],
                ],
            ],
        ],
    ];

    public function internal(array $input): array
    {
        $model = new Types();
        $inner_model = $model->getByColumn(
            'sm_poltype_code',
            $input['sm_policy_sm_poltype_code'],
            'sm_poltype_model',
        );
        $abstract = \Factory::model($inner_model, true);
        $result = $abstract->validate((new \Json2($input['sm_policy_external_json']))->toArray());
        if (!$result['success']) {
            throw new \Exception('Could not validate sm_policy_external_json field: ' . implode(', ', $result['error']));
        }
        // put normilized json back
        $input['sm_policy_internal_json'] = $result['data'];
        return $input;
    }
}
