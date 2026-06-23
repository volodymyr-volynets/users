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

class ImportExternalActions extends Import
{
    public $data = [
        'external_resource_actions1' => [
            'options' => [
                'pk' => ['um_extactn_tenant_id', 'um_extactn_id'],
                'model' => '\Numbers\Users\Users\Model\Resource\ExternalActions',
                'method' => 'save'
            ],
            'data' => [
                [
                    'um_extactn_tenant_id' => null,
                    'um_extactn_id' => -1,
                    'um_extactn_code' => 'All_Actions',
                    'um_extactn_name' => 'All Actions',
                    'um_extactn_icon' => 'fa-solid fa-cubes',
                    'um_extactn_parent_um_extactn_id' => null,
                    'um_extactn_prohibitive' => 0,
                    'um_extactn_order' => 1000,
                    'um_extactn_inactive' => 0,
                ],
                [
                    'um_extactn_tenant_id' => null,
                    'um_extactn_id' => '::id::List_View',
                    'um_extactn_code' => 'List_View',
                    'um_extactn_name' => 'View List',
                    'um_extactn_icon' => 'fa-solid fa-list',
                    'um_extactn_parent_um_extactn_id' => null,
                    'um_extactn_prohibitive' => 0,
                    'um_extactn_order' => 2000,
                    'um_extactn_inactive' => 0,
                ],
                [
                    'um_extactn_tenant_id' => null,
                    'um_extactn_id' => '::id::Record_View',
                    'um_extactn_code' => 'Record_View',
                    'um_extactn_name' => 'View Record',
                    'um_extactn_icon' => 'fa-solid fa-eye',
                    'um_extactn_parent_um_extactn_id' => null,
                    'um_extactn_prohibitive' => 0,
                    'um_extactn_order' => 3000,
                    'um_extactn_inactive' => 0,
                ],
            ],
        ],
        'external_resource_actions2' => [
            'options' => [
                'pk' => ['um_extactn_tenant_id', 'um_extactn_id'],
                'model' => '\Numbers\Users\Users\Model\Resource\ExternalActions',
                'method' => 'save'
            ],
            'data' => [
                [
                    'um_extactn_tenant_id' => null,
                    'um_extactn_id' => '::id::Record_Edit',
                    'um_extactn_code' => 'Record_Edit',
                    'um_extactn_name' => 'Edit Record',
                    'um_extactn_icon' => 'fa-solid fa-pen-square',
                    'um_extactn_parent_um_extactn_id' => '::id::Record_View',
                    'um_extactn_prohibitive' => 0,
                    'um_extactn_order' => 4000,
                    'um_extactn_inactive' => 0,
                ],
                [
                    'um_extactn_tenant_id' => null,
                    'um_extactn_id' => '::id::Import_Records',
                    'um_extactn_code' => 'Import_Records',
                    'um_extactn_name' => 'Import Records',
                    'um_extactn_icon' => 'fa-solid fa-upload',
                    'um_extactn_parent_um_extactn_id' => null,
                    'um_extactn_prohibitive' => 0,
                    'um_extactn_order' => 5000,
                    'um_extactn_inactive' => 0,
                ],
                // report related items
                [
                    'um_extactn_tenant_id' => null,
                    'um_extactn_id' => '::id::Report_View',
                    'um_extactn_code' => 'Report_View',
                    'um_extactn_name' => 'View Report',
                    'um_extactn_icon' => 'fa-solid fa-table',
                    'um_extactn_parent_um_extactn_id' => null,
                    'um_extactn_prohibitive' => 0,
                    'um_extactn_order' => 6000,
                    'um_extactn_inactive' => 0,
                ],
                // activate
                [
                    'um_extactn_tenant_id' => null,
                    'um_extactn_id' => '::id::Activate_Data',
                    'um_extactn_code' => 'Activate_Data',
                    'um_extactn_name' => 'Activate Data',
                    'um_extactn_icon' => 'fa-solid fa-link',
                    'um_extactn_parent_um_extactn_id' => null,
                    'um_extactn_prohibitive' => 0,
                    'um_extactn_order' => 7000,
                    'um_extactn_inactive' => 0,
                ],
            ],
        ],
        'external_resource_actions3' => [
            'options' => [
                'pk' => ['um_extactn_tenant_id', 'um_extactn_id'],
                'model' => '\Numbers\Users\Users\Model\Resource\ExternalActions',
                'method' => 'save'
            ],
            'data' => [
                [
                    'um_extactn_tenant_id' => null,
                    'um_extactn_id' => '::id::List_Export',
                    'um_extactn_code' => 'List_Export',
                    'um_extactn_name' => 'Export/Print List',
                    'um_extactn_icon' => 'fa-solid fa-print',
                    'um_extactn_parent_um_extactn_id' => '::id::List_View',
                    'um_extactn_prohibitive' => 0,
                    'um_extactn_order' => 2100,
                    'um_extactn_inactive' => 0,
                ],
                [
                    'um_extactn_tenant_id' => null,
                    'um_extactn_id' => '::id::Record_Public',
                    'um_extactn_code' => 'Record_Public',
                    'um_extactn_name' => 'View Public',
                    'um_extactn_icon' => 'fa-solid fa-users-cog',
                    'um_extactn_parent_um_extactn_id' => '::id::Record_View',
                    'um_extactn_prohibitive' => 1,
                    'um_extactn_order' => 3100,
                    'um_extactn_inactive' => 0,
                ],
                [
                    'um_extactn_tenant_id' => null,
                    'um_extactn_id' => '::id::Record_New',
                    'um_extactn_code' => 'Record_New',
                    'um_extactn_name' => 'New Record',
                    'um_extactn_icon' => 'fa-regular fa-file',
                    'um_extactn_parent_um_extactn_id' => '::id::Record_View',
                    'um_extactn_prohibitive' => 0,
                    'um_extactn_order' => 3200,
                    'um_extactn_inactive' => 0,
                ],
                [
                    'um_extactn_tenant_id' => null,
                    'um_extactn_id' => '::id::Record_Inactivate',
                    'um_extactn_code' => 'Record_Inactivate',
                    'um_extactn_name' => 'Inactivate Record',
                    'um_extactn_icon' => 'fa-solid fa-info',
                    'um_extactn_parent_um_extactn_id' => '::id::Record_Edit',
                    'um_extactn_prohibitive' => 0,
                    'um_extactn_order' => 4100,
                    'um_extactn_inactive' => 0,
                ],
                [
                    'um_extactn_tenant_id' => null,
                    'um_extactn_id' => '::id::Record_Delete',
                    'um_extactn_code' => 'Record_Delete',
                    'um_extactn_name' => 'Delete Record',
                    'um_extactn_icon' => 'fa-regular fa-trash-alt',
                    'um_extactn_parent_um_extactn_id' => '::id::Record_Edit',
                    'um_extactn_prohibitive' => 0,
                    'um_extactn_order' => 4200,
                    'um_extactn_inactive' => 0,
                ],
                [
                    'um_extactn_tenant_id' => null,
                    'um_extactn_id' => '::id::Record_Post',
                    'um_extactn_code' => 'Record_Post',
                    'um_extactn_name' => 'Post Record',
                    'um_extactn_icon' => 'fa-solid fa-archive',
                    'um_extactn_parent_um_extactn_id' => '::id::Record_Edit',
                    'um_extactn_prohibitive' => 0,
                    'um_extactn_order' => 4300,
                    'um_extactn_inactive' => 0,
                ],
                [
                    'um_extactn_tenant_id' => null,
                    'um_extactn_id' => '::id::Record_Approve',
                    'um_extactn_code' => 'Record_Approve',
                    'um_extactn_name' => 'Approve Record',
                    'um_extactn_icon' => 'fa-regular fa-handshake',
                    'um_extactn_parent_um_extactn_id' => '::id::Record_Edit',
                    'um_extactn_prohibitive' => 0,
                    'um_extactn_order' => 4400,
                    'um_extactn_inactive' => 0,
                ],
                [
                    'um_extactn_tenant_id' => null,
                    'um_extactn_id' => '::id::Record_Join',
                    'um_extactn_code' => 'Record_Join',
                    'um_extactn_name' => 'Join Record',
                    'um_extactn_icon' => 'fa-regular fa-handshake',
                    'um_extactn_parent_um_extactn_id' => '::id::Record_View',
                    'um_extactn_prohibitive' => 0,
                    'um_extactn_order' => 3300,
                    'um_extactn_inactive' => 0,
                ],
            ]
        ],
    ];
}
