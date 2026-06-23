<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Helper\Dashboard;

class Dashboard extends Builder
{
    /**
     * Data
     *
     * @var array
     */
    public $data = [
        1 => [
            1 => [
                'name' => 'Users',
                'icon' => 'fa-solid fa-users',
                'acl' => [
                    'resource_id' => '\Numbers\Users\Users\Controller\Users',
                    'method_code' => 'Index',
                    'action_id' => 'List_View'
                ],
                'url' => '/Default/Numbers/Users/Users/Controller/Users'
            ],
            2 => [
                'icon' => 'fa-solid fa-arrow-right'
            ],
            3 => [
                'name' => 'New User',
                'icon' => 'fa-solid fa-user',
                'acl' => [
                    'resource_id' => '\Numbers\Users\Users\Controller\Users',
                    'method_code' => 'Edit',
                    'action_id' => 'Record_View'
                ],
                'url' => '/Default/Numbers/Users/Users/Controller/Users/_Edit?__submit_blank=1'
            ],
            4 => [
                'name' => '&nbsp;'
            ],
            5 => [
                'name' => 'Settings',
                'icon' => 'fa-solid fa-cogs',
                'acl' => [
                    'resource_id' => '\Numbers\Users\Users\Controller\Settings',
                    'method_code' => 'Edit',
                    'action_id' => 'Record_View'
                ],
                'url' => '/Default/Numbers/Users/Users/Controller/Settings/_Edit?__submit_blank=1'
            ],
            6 => [
                'name' => '&nbsp;'
            ],
            7 => [
                'name' => 'Groups',
                'icon' => 'fa-regular fa-object-group',
                'acl' => [
                    'resource_id' => '\Numbers\Users\Users\Controller\Groups',
                    'method_code' => 'Index',
                    'action_id' => 'List_View'
                ],
                'url' => '/Default/Numbers/Users/Users/Controller/Groups'
            ],
            8 => [
                'name' => 'Roles',
                'icon' => 'fa-regular fa-user-circle',
                'acl' => [
                    'resource_id' => '\Numbers\Users\Users\Controller\Roles',
                    'method_code' => 'Index',
                    'action_id' => 'List_View'
                ],
                'url' => '/Default/Numbers/Users/Users/Controller/Roles'
            ],
            9 => [
                'name' => 'Titles',
                'icon' => 'fa-solid fa-blind',
                'acl' => [
                    'resource_id' => '\Numbers\Users\Users\Controller\Titles',
                    'method_code' => 'Index',
                    'action_id' => 'List_View'
                ],
                'url' => '/Default/Numbers/Users/Users/Controller/Titles'
            ],
            10 => [
                'name' => 'Teams',
                'icon' => 'fa-solid fa-sitemap',
                'acl' => [
                    'resource_id' => '\Numbers\Users\Users\Controller\Teams',
                    'method_code' => 'Index',
                    'action_id' => 'List_View'
                ],
                'url' => '/Default/Numbers/Users/Users/Controller/Teams'
            ],
            11 => [
                'name' => 'Assignment Types',
                'icon' => 'fa-solid fa-link',
                'acl' => [
                    'resource_id' => '\Numbers\Users\Users\Controller\Assignment\Types',
                    'method_code' => 'Index',
                    'action_id' => 'List_View'
                ],
                'url' => '/Default/Numbers/Users/Users/Controller/Assignment/Types'
            ],
            12 => [
                'name' => 'Owner Types',
                'icon' => 'fa-brands fa-gg',
                'acl' => [
                    'resource_id' => '\Numbers\Users\Users\Controller\Owner\Types',
                    'method_code' => 'Index',
                    'action_id' => 'List_View'
                ],
                'url' => '/Default/Numbers/Users/Users/Controller/Owner/Types'
            ],
        ],
        2 => [
            1 => [
                'name' => '&nbsp;'
            ]
        ],
        3 => [
            1 => [
                'name' => 'Security Reports'
            ],
            2 => [
                'name' => 'Organization Access Report',
                'icon' => 'fa-regular fa-building',
                'acl' => [
                    'resource_id' => '\Numbers\Users\Users\Controller\Report\Security\OrganizationAccessReport',
                    'method_code' => 'Index',
                    'action_id' => 'Report_View'
                ],
                'url' => '/Default/Numbers/Users/Users/Controller/Report/Security/OrganizationAccessReport'
            ],
            3 => [
                'name' => 'Resource Setup Report',
                'icon' => 'fa-solid fa-tasks',
                'acl' => [
                    'resource_id' => '\Numbers\Users\Users\Controller\Report\Security\ResourceSetupReport',
                    'method_code' => 'Index',
                    'action_id' => 'Report_View'
                ],
                'url' => '/Default/Numbers/Users/Users/Controller/Report/Security/ResourceSetupReport'
            ],
            4 => [
                'name' => 'Role Setup Report',
                'icon' => 'fa-regular fa-user-circle',
                'acl' => [
                    'resource_id' => '\Numbers\Users\Users\Controller\Report\Security\RoleSetupReport',
                    'method_code' => 'Index',
                    'action_id' => 'Report_View'
                ],
                'url' => '/Default/Numbers/Users/Users/Controller/Report/Security/RoleSetupReport'
            ],
            5 => [
                'name' => 'Team Setup Report',
                'icon' => 'fa-solid fa-sitemap',
                'acl' => [
                    'resource_id' => '\Numbers\Users\Users\Controller\Report\Security\TeamSetupReport',
                    'method_code' => 'Index',
                    'action_id' => 'Report_View'
                ],
                'url' => '/Default/Numbers/Users/Users/Controller/Report/Security/TeamSetupReport'
            ],
            6 => [
                'name' => 'User Setup Report',
                'icon' => 'fa-solid fa-user-friends',
                'acl' => [
                    'resource_id' => '\Numbers\Users\Users\Controller\Report\Security\UserSetupReport',
                    'method_code' => 'Index',
                    'action_id' => 'Report_View'
                ],
                'url' => '/Default/Numbers/Users/Users/Controller/Report/Security/UserSetupReport'
            ],
        ]
    ];

    /**
     * Constructor
     */
    public function __construct()
    {
    }
}
