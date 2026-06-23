<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Collection;

use Object\Collection;

class Teams extends Collection
{
    public $data = [
        'name' => 'Teams',
        'model' => '\Numbers\Users\Users\Model\Teams',
        'details' => [
            '\Numbers\Users\Users\Model\Team\Organizations' => [
                'name' => 'Organizations',
                'pk' => ['um_temorg_tenant_id', 'um_temorg_team_id', 'um_temorg_organization_id'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temorg_tenant_id', 'um_team_id' => 'um_temorg_team_id']
            ],
            '\Numbers\Users\Users\Model\Team\Permissions' => [
                'name' => 'Permissions',
                'pk' => ['um_temperm_tenant_id', 'um_temperm_team_id', 'um_temperm_module_id', 'um_temperm_resource_id'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temperm_tenant_id', 'um_team_id' => 'um_temperm_team_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\Team\Permission\Actions' => [
                        'name' => 'Permission Actions',
                        'pk' => ['um_temperaction_tenant_id', 'um_temperaction_team_id', 'um_temperaction_module_id', 'um_temperaction_resource_id', 'um_temperaction_method_code', 'um_temperaction_action_id'],
                        'type' => '1M',
                        'map' => ['um_temperm_tenant_id' => 'um_temperaction_tenant_id', 'um_temperm_team_id' => 'um_temperaction_team_id', 'um_temperm_module_id' => 'um_temperaction_module_id', 'um_temperm_resource_id' => 'um_temperaction_resource_id'],
                    ],
                    '\Numbers\Users\Users\Model\Team\Permission\Subresources' => [
                        'name' => 'Permission Subresources',
                        'pk' => ['um_temsubres_tenant_id', 'um_temsubres_team_id', 'um_temsubres_module_id', 'um_temsubres_resource_id', 'um_temsubres_rsrsubres_id', 'um_temsubres_action_id'],
                        'type' => '1M',
                        'map' => ['um_temperm_tenant_id' => 'um_temsubres_tenant_id', 'um_temperm_team_id' => 'um_temsubres_team_id', 'um_temperm_module_id' => 'um_temsubres_module_id', 'um_temperm_resource_id' => 'um_temsubres_resource_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\Team\APIs' => [
                'name' => 'APIs',
                'pk' => ['um_temapi_tenant_id', 'um_temapi_team_id', 'um_temapi_module_id', 'um_temapi_resource_id'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temapi_tenant_id', 'um_team_id' => 'um_temapi_team_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\Team\API\Methods' => [
                        'name' => 'API Methods',
                        'pk' => ['um_temapmethod_tenant_id', 'um_temapmethod_team_id', 'um_temapmethod_module_id', 'um_temapmethod_resource_id', 'um_temapmethod_method_code'],
                        'type' => '1M',
                        'map' => ['um_temapi_tenant_id' => 'um_temapmethod_tenant_id', 'um_temapi_team_id' => 'um_temapmethod_team_id', 'um_temapi_module_id' => 'um_temapmethod_module_id', 'um_temapi_resource_id' => 'um_temapmethod_resource_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\Team\Notifications' => [
                'name' => 'Notifications',
                'pk' => ['um_temnoti_tenant_id', 'um_temnoti_team_id', 'um_temnoti_module_id', 'um_temnoti_feature_code'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temnoti_tenant_id', 'um_team_id' => 'um_temnoti_team_id']
            ],
            '\Numbers\Users\Users\Model\Team\Features' => [
                'name' => 'Features',
                'pk' => ['um_temfeature_tenant_id', 'um_temfeature_team_id', 'um_temfeature_module_id', 'um_temfeature_feature_code'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temfeature_tenant_id', 'um_team_id' => 'um_temfeature_team_id']
            ],
            '\Numbers\Users\Users\Model\Team\Flags' => [
                'name' => 'Flags',
                'pk' => ['um_temsysflag_tenant_id', 'um_temsysflag_team_id', 'um_temsysflag_module_id', 'um_temsysflag_sysflag_id', 'um_temsysflag_action_id'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_temsysflag_tenant_id', 'um_team_id' => 'um_temsysflag_team_id']
            ],
            '\Numbers\Users\Users\Model\Team\Policy\Policies' => [
                'name' => 'UM Team Policies',
                'pk' => ['um_tempolicy_tenant_id', 'um_tempolicy_team_id', 'um_tempolicy_sm_policy_tenant_id', 'um_tempolicy_sm_policy_code'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_tempolicy_tenant_id', 'um_team_id' => 'um_tempolicy_team_id']
            ],
            '\Numbers\Users\Users\Model\Team\Policy\Groups' => [
                'name' => 'UM Team Policy Groups',
                'pk' => ['um_tempolgrp_tenant_id', 'um_tempolgrp_team_id', 'um_tempolgrp_sm_polgroup_tenant_id', 'um_tempolgrp_sm_polgroup_id'],
                'type' => '1M',
                'map' => ['um_team_tenant_id' => 'um_tempolgrp_tenant_id', 'um_team_id' => 'um_tempolgrp_team_id']
            ],
        ]
    ];
}
