<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\OAuth\Data;

use Object\Import;

class Providers extends Import
{
    public $data = [
        'modules' => [
            'options' => [
                'pk' => ['oa_provider_code'],
                'model' => '\Numbers\Users\OAuth\Model\Providers',
                'method' => 'save'
            ],
            'data' => [
                [
                    'oa_provider_code' => 'FACEBOOK',
                    'oa_provider_name' => 'Facebook',
                    'oa_provider_model' => '\Numbers\Users\OAuth\Model\Provider\Facebook',
                    'oa_provider_icon' => 'fab fa-facebook',
                    'oa_provider_order' => 1000,
                    'oa_provider_inactive' => 0,
                ],
                [
                    'oa_provider_code' => 'GOOGLE',
                    'oa_provider_name' => 'Google',
                    'oa_provider_model' => '\Numbers\Users\OAuth\Model\Provider\Google',
                    'oa_provider_icon' => 'fab fa-google',
                    'oa_provider_order' => 2000,
                    'oa_provider_inactive' => 0,
                ]
            ]
        ],
    ];
}
