<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Data;

use Object\Import;

class DirectoryListing extends Import
{
    public $data = [
        'modules' => [
            'options' => [
                'pk' => ['um_dirlisttype_id'],
                'model' => '\Numbers\Users\Users\Model\DirectoryListing\Types',
                'method' => 'save'
            ],
            'data' => [
                [
                    'um_dirlisttype_id' => 1000,
                    'um_dirlisttype_name' => 'Users',
                    'um_dirlisttype_icon' => 'fa-solid fa-users',
                    'um_dirlisttype_order' => 1000,
                    'um_dirlisttype_parent_um_dirlisttype_id' => null,
                    'um_dirlisttype_root' => 1,
                    'um_dirlisttype_inactive' => 0,
                ],
                [
                    'um_dirlisttype_id' => 1100,
                    'um_dirlisttype_name' => 'User Types',
                    'um_dirlisttype_icon' => 'fa-regular fa-object-ungroup',
                    'um_dirlisttype_order' => 1100,
                    'um_dirlisttype_parent_um_dirlisttype_id' => 1000,
                    'um_dirlisttype_root' => 0,
                    'um_dirlisttype_inactive' => 0,
                ],
                [
                    'um_dirlisttype_id' => 1200,
                    'um_dirlisttype_name' => 'User Organizations',
                    'um_dirlisttype_icon' => 'fa-regular fa-building',
                    'um_dirlisttype_order' => 1110,
                    'um_dirlisttype_parent_um_dirlisttype_id' => 1000,
                    'um_dirlisttype_root' => 0,
                    'um_dirlisttype_inactive' => 0,
                ],
                [
                    'um_dirlisttype_id' => 1300,
                    'um_dirlisttype_name' => 'User Roles',
                    'um_dirlisttype_icon' => 'fa-regular fa-user-circle',
                    'um_dirlisttype_order' => 1300,
                    'um_dirlisttype_parent_um_dirlisttype_id' => 1000,
                    'um_dirlisttype_root' => 0,
                    'um_dirlisttype_inactive' => 0,
                ],
                [
                    'um_dirlisttype_id' => 1400,
                    'um_dirlisttype_name' => 'User Teams',
                    'um_dirlisttype_icon' => 'fa-solid fa-sitemap',
                    'um_dirlisttype_order' => 1400,
                    'um_dirlisttype_parent_um_dirlisttype_id' => 1000,
                    'um_dirlisttype_root' => 0,
                    'um_dirlisttype_inactive' => 0,
                ],
                [
                    'um_dirlisttype_id' => 1500,
                    'um_dirlisttype_name' => 'User Realms',
                    'um_dirlisttype_icon' => 'fa-solid fa-user-circle',
                    'um_dirlisttype_order' => 1500,
                    'um_dirlisttype_parent_um_dirlisttype_id' => 1000,
                    'um_dirlisttype_root' => 0,
                    'um_dirlisttype_inactive' => 0,
                ],
                [
                    'um_dirlisttype_id' => 1600,
                    'um_dirlisttype_name' => 'User Domains',
                    'um_dirlisttype_icon' => 'fa-solid fa-user-lock',
                    'um_dirlisttype_order' => 1600,
                    'um_dirlisttype_parent_um_dirlisttype_id' => 1000,
                    'um_dirlisttype_root' => 0,
                    'um_dirlisttype_inactive' => 0,
                ],
                [
                    'um_dirlisttype_id' => 1700,
                    'um_dirlisttype_name' => 'User Groups',
                    'um_dirlisttype_icon' => 'fa-regular fa-object-group',
                    'um_dirlisttype_order' => 1700,
                    'um_dirlisttype_parent_um_dirlisttype_id' => 1000,
                    'um_dirlisttype_root' => 0,
                    'um_dirlisttype_inactive' => 0,
                ],
                [
                    'um_dirlisttype_id' => 1800,
                    'um_dirlisttype_name' => 'User Classifications',
                    'um_dirlisttype_icon' => 'fa-brands fa-diaspora',
                    'um_dirlisttype_order' => 1800,
                    'um_dirlisttype_parent_um_dirlisttype_id' => 1000,
                    'um_dirlisttype_root' => 0,
                    'um_dirlisttype_inactive' => 0,
                ],
                /*
                [
                    'um_dirlisttype_id' => 1200,
                    'um_dirlisttype_name' => 'Users',
                    'um_dirlisttype_icon' => 'fa-regular fa-user-circle',
                    'um_dirlisttype_order' => 1200,
                    'um_dirlisttype_parent_um_dirlisttype_id' => 1100,
                    'um_dirlisttype_root' => 0,
                    'um_dirlisttype_inactive' => 0,
                ]
                */
            ]
        ],
    ];
}
