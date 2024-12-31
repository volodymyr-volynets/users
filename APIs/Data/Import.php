<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\APIs\Data;

class Import extends \Object\Import
{
    public $data = [
        'modules' => [
            'options' => [
                'pk' => ['sm_module_code'],
                'model' => '\Numbers\Backend\System\Modules\Model\Collection\Modules',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_module_code' => 'A3',
                    'sm_module_type' => 20,
                    'sm_module_name' => 'A/3 API Management',
                    'sm_module_abbreviation' => 'A/3',
                    'sm_module_icon' => 'fab fa-node',
                    'sm_module_transactions' => 0,
                    'sm_module_multiple' => 0,
                    'sm_module_activation_model' => null,
                    'sm_module_custom_activation' => false,
                    'sm_module_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Module\Dependencies' => []
                ]
            ]
        ],
        'features' => [
            'options' => [
                'pk' => ['sm_feature_code'],
                'model' => '\Numbers\Backend\System\Modules\Model\Collection\Module\Features',
                'method' => 'save'
            ],
            'data' => [
                [
                    'sm_feature_module_code' => 'A3',
                    'sm_feature_code' => 'A3::APIS',
                    'sm_feature_type' => 10,
                    'sm_feature_name' => 'A/3 APIs',
                    'sm_feature_icon' => 'fab fa-node',
                    'sm_feature_activation_model' => null,
                    'sm_feature_activated_by_default' => 1,
                    'sm_feature_inactive' => 0,
                    '\Numbers\Backend\System\Modules\Model\Module\Dependencies' => [
                        [
                            'sm_mdldep_child_module_code' => 'UM',
                            'sm_mdldep_child_feature_code' => 'UM::USERS'
                        ]
                    ]
                ],
            ]
        ]
    ];
}
