<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Override;

class DevPortal
{
    public $data = [
        'Links' => [
            'Global' => [
                'Tenant Registration' => [
                    'url' => '/Numbers/Users/Users/Controller/Registration/Tenant',
                    'name' => 'Tenant Registration',
                    'icon' => 'fas fa-pencil-alt'
                ],
                'Email Templates' => [
                    'url' => '/Numbers/Users/Users/Controller/DevPortal/EmailTemplates',
                    'name' => 'Email Templates',
                    'icon' => 'fas fa-mail-bulk'
                ]
            ]
        ]
    ];
}
