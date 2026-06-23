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

class Presets extends Import
{
    public $data = [
        'presets' => [
            'options' => [
                'pk' => ['um_imppreset_id'],
                'model' => '\Numbers\Users\Users\Model\Import\Presets',
                'method' => 'save'
            ],
            'data' => [
                [
                    'um_imppreset_id' => '::id::UM_External_Resource_Actions',
                    'um_imppreset_code' => 'UM_External_Resource_Actions',
                    'um_imppreset_name' => 'U/M External Resource Actions',
                    'um_imppreset_module_code' => 'UM',
                    'um_imppreset_sm_model_id' => '::id::\Numbers\Users\Users\Model\Resource\ExternalActions',
                    'um_imppreset_sm_model_code' => '\Numbers\Users\Users\Model\Resource\ExternalActions',
                    'um_imppreset_activation_method' => '\Numbers\Users\Users\Data\Preset\ImportExternalActions',
                    'um_imppreset_inactive' => 0,
                ],
                [
                    'um_imppreset_id' => '::id::UM_WeightedAccesses',
                    'um_imppreset_code' => 'UM_WeightedAccesses',
                    'um_imppreset_name' => 'U/M Weighted Accesses',
                    'um_imppreset_module_code' => 'UM',
                    'um_imppreset_sm_model_id' => '::id::\Numbers\Users\Users\Model\Resource\WeightedAccesses',
                    'um_imppreset_sm_model_code' => '\Numbers\Users\Users\Model\Resource\WeightedAccesses',
                    'um_imppreset_activation_method' => '\Numbers\Users\Users\Data\Preset\ImportWeightedAccesses',
                    'um_imppreset_inactive' => 0,
                ],
            ]
        ],
    ];
}
