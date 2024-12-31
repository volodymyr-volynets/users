<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Override;

class Aliases
{
    public $data = [
        'organization_id' => [
            'no_data_alias_name' => 'Organization #',
            'no_data_alias_model' => '\Numbers\Users\Organizations\Model\Organizations',
            'no_data_alias_column' => 'on_organization_code'
        ],
        'brand_id' => [
            'no_data_alias_name' => 'Brand #',
            'no_data_alias_model' => '\Numbers\Users\Organizations\Model\Brands',
            'no_data_alias_column' => 'on_brand_code'
        ]
    ];
}
