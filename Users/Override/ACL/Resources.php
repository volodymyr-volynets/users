<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Override\ACL;

class Resources
{
    public $data = [
        'application_structure' => [
            'tenant' => [
                'tenant_datasource' => '\Numbers\Tenants\Tenants\DataSource\Tenants',
                'column_prefix' => 'tm_tenant_'
            ]
        ],
        'authorization' => [
            'login' => [
                'url' => '/Default/Numbers/Users/Users/Controller/Login'
            ],
            'logout' => [
                'url' => '/Default/Numbers/Users/Users/Controller/Logout/Quick'
            ]
        ],
        'controllers' => [
            'primary' => [
                'datasource' => '\Numbers\Users\Users\DataSource\ACL\Controllers'
            ]
        ],
        'subresources' => [
            'primary' => [
                'datasource' => '\Numbers\Users\Users\DataSource\ACL\AllSubresources'
            ]
        ],
        'roles' => [
            'primary' => [
                'datasource' => '\Numbers\Users\Users\DataSource\ACL\Roles'
            ],
            'teams' => [
                'datasource' => '\Numbers\Users\Users\DataSource\ACL\Teams'
            ],
            'policies' => [
                'datasource' => '\Numbers\Users\Users\DataSource\ACL\Policy\Policies'
            ],
            'policy_groups' => [
                'datasource' => '\Numbers\Users\Users\DataSource\ACL\Policy\Groups'
            ],
            'settings' => [
                'datasource' => '\Numbers\Users\Users\DataSource\ACL\Settings'
            ]
        ],
        'owners' => [
            'primary' => [
                'datasource' => '\Numbers\Users\Users\DataSource\Owner\Roles'
            ],
        ],
        'menu' => [
            'primary' => [
                'datasource' => '\Numbers\Users\Users\DataSource\ACL\Menu\Permissions'
            ],
            'usage' => [
                'datasource' => '\Numbers\Users\Users\DataSource\ACL\Menu'
            ]
        ],
        'user_roles' => [
            'anonymous' => [
                'data' => 'SYSTEM_ANONYMOUS'
            ],
            'authorized' => [
                'data' => 'SYSTEM_AUTHORIZED'
            ]
        ],
        'destroy' => [
            'log_notifications' => [
                'method' => '\Numbers\Users\Users\Helper\Notification\Sender::destroy'
            ]
        ],
        'postlogin_brand_url' => [
            'url' => [
                'url' => '/Numbers/Users/Users/Controller/Helper/Dashboard'
            ]
        ],
        'form_overrides' => [
            'primary' => [
                'model' => '\Numbers\Users\Users\DataSource\ACL\Form\Overrides'
            ]
        ],
    ];
}
