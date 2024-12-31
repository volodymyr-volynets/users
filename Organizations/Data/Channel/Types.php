<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Data\Channel;

use Object\Import;

class Types extends Import
{
    public $data = [
        'types' => [
            'options' => [
                'pk' => ['um_chantype_code'],
                'model' => '\Numbers\Users\Users\Model\Channel\Types',
                'method' => 'save'
            ],
            'data' => [
                [
                    'um_chantype_code' => 'ON::ORGANIZATONS',
                    'um_chantype_name' => 'O/N Organizations',
                    'um_chantype_module_code' => 'ON',
                    'um_chantype_model' => '\Numbers\Users\Organizations\Model\Organizations',
                    'um_chantype_validator_method' => null,
                    'um_chantype_field_code' => 'on_organization_id',
                    'um_chantype_field_name' => 'O/N Organization #',
                    'um_chantype_inactive' => 0,
                ],
            ],
        ],
    ];
}
