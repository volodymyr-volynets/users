<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Override\ACL;

class Resources
{
    public $data = [
        'layout' => [
            'logo' => [
                'method' => '\Numbers\Users\Organizations\Helper\Logo::getURL'
            ],
            'name' => [
                'method' => '\Numbers\Users\Organizations\Helper\Logo::getName'
            ]
        ],
        'postlogin_dashboard' => [
            'numbers_organizations' => [
                'name' => 'Organization Management',
                'icon' => 'fas fa-building',
                'model' => '\Numbers\Users\Organizations\Helper\Dashboard',
                'order' => 33000
            ]
        ],
    ];
}
