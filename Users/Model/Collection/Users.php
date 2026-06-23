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

class Users extends Collection
{
    public $data = [
        'name' => 'UM Users',
        'model' => '\Numbers\Users\Users\Model\Users',
        'details' => [
            '\Numbers\Users\Users\Model\User\Group\Map' => [
                'name' => 'UM Groups',
                'pk' => ['um_usrgrmap_tenant_id', 'um_usrgrmap_user_id', 'um_usrgrmap_group_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrgrmap_tenant_id', 'um_user_id' => 'um_usrgrmap_user_id']
            ],
            '\Numbers\Users\Users\Model\Team\Map' => [
                'name' => 'UM Teams',
                'pk' => ['um_usrtmmap_tenant_id', 'um_usrtmmap_user_id', 'um_usrtmmap_team_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrtmmap_tenant_id', 'um_user_id' => 'um_usrtmmap_user_id'],
            ],
            '\Numbers\Users\Users\Model\User\Roles' => [
                'name' => 'UM Roles',
                'pk' => ['um_usrrol_tenant_id', 'um_usrrol_user_id', 'um_usrrol_role_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrrol_tenant_id', 'um_user_id' => 'um_usrrol_user_id'],
            ],
            '\Numbers\Users\Users\Model\User\Organizations' => [
                'name' => 'UM Organizations',
                'pk' => ['um_usrorg_tenant_id', 'um_usrorg_user_id', 'um_usrorg_organization_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrorg_tenant_id', 'um_user_id' => 'um_usrorg_user_id'],
            ],
            '\Numbers\Users\Users\Model\User\Internalization' => [
                'name' => 'UM Internalization',
                'pk' => ['um_usri18n_tenant_id', 'um_usri18n_user_id'],
                'type' => '11',
                'map' => ['um_user_tenant_id' => 'um_usri18n_tenant_id', 'um_user_id' => 'um_usri18n_user_id']
            ],
            '\Numbers\Users\Users\Model\User\PIIs' => [
                'name' => 'UM Demographics',
                'pk' => ['um_usrpii_tenant_id', 'um_usrpii_user_id'],
                'type' => '11',
                'map' => ['um_user_tenant_id' => 'um_usrpii_tenant_id', 'um_user_id' => 'um_usrpii_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Languages' => [
                'name' => 'UM Languages',
                'pk' => ['um_usrsplang_tenant_id', 'um_usrsplang_user_id', 'um_usrsplang_language_code'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrsplang_tenant_id', 'um_user_id' => 'um_usrsplang_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Skills' => [
                'name' => 'UM Skills',
                'pk' => ['um_usrskill_tenant_id', 'um_usrskill_user_id', 'um_usrskill_name'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrskill_tenant_id', 'um_user_id' => 'um_usrskill_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Preferences' => [
                'name' => 'UM Preferences',
                'pk' => ['um_usrpreference_tenant_id', 'um_usrpreference_user_id'],
                'type' => '11',
                'map' => ['um_user_tenant_id' => 'um_usrpreference_tenant_id', 'um_user_id' => 'um_usrpreference_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Mentions' => [
                'name' => 'UM Mentions',
                'pk' => ['um_usrmention_tenant_id', 'um_usrmention_user_id', 'um_usrmention_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrmention_tenant_id', 'um_user_id' => 'um_usrmention_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Notifications' => [
                'name' => 'UM Notifications',
                'pk' => ['um_usrnoti_tenant_id', 'um_usrnoti_user_id', 'um_usrnoti_module_id', 'um_usrnoti_feature_code'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrnoti_tenant_id', 'um_user_id' => 'um_usrnoti_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Features' => [
                'name' => 'UM Features',
                'pk' => ['um_usrfeature_tenant_id', 'um_usrfeature_user_id', 'um_usrfeature_module_id', 'um_usrfeature_feature_code'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrfeature_tenant_id', 'um_user_id' => 'um_usrfeature_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Flags' => [
                'name' => 'UM Flags',
                'pk' => ['um_usrsysflag_tenant_id', 'um_usrsysflag_user_id', 'um_usrsysflag_module_id', 'um_usrsysflag_sysflag_id', 'um_usrsysflag_action_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrsysflag_tenant_id', 'um_user_id' => 'um_usrsysflag_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Permissions' => [
                'name' => 'UM Permissions',
                'pk' => ['um_usrperm_tenant_id', 'um_usrperm_user_id', 'um_usrperm_module_id', 'um_usrperm_resource_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrperm_tenant_id', 'um_user_id' => 'um_usrperm_user_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\User\Permission\Actions' => [
                        'name' => 'UM Permission Actions',
                        'pk' => ['um_usrperaction_tenant_id', 'um_usrperaction_user_id', 'um_usrperaction_module_id', 'um_usrperaction_resource_id', 'um_usrperaction_method_code', 'um_usrperaction_action_id'],
                        'type' => '1M',
                        'map' => ['um_usrperm_tenant_id' => 'um_usrperaction_tenant_id', 'um_usrperm_user_id' => 'um_usrperaction_user_id', 'um_usrperm_module_id' => 'um_usrperaction_module_id', 'um_usrperm_resource_id' => 'um_usrperaction_resource_id'],
                    ],
                    '\Numbers\Users\Users\Model\User\Permission\Subresources' => [
                        'name' => 'UM Permission Subresources',
                        'pk' => ['um_usrsubres_tenant_id', 'um_usrsubres_user_id', 'um_usrsubres_module_id', 'um_usrsubres_resource_id', 'um_usrsubres_rsrsubres_id', 'um_usrsubres_action_id'],
                        'type' => '1M',
                        'map' => ['um_usrperm_tenant_id' => 'um_usrsubres_tenant_id', 'um_usrperm_user_id' => 'um_usrsubres_user_id', 'um_usrperm_module_id' => 'um_usrsubres_module_id', 'um_usrperm_resource_id' => 'um_usrsubres_resource_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\User\Security\Answers' => [
                'name' => 'UM Security Answers',
                'pk' => ['um_usrsecanswer_tenant_id', 'um_usrsecanswer_user_id', 'um_usrsecanswer_question_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrsecanswer_tenant_id', 'um_user_id' => 'um_usrsecanswer_user_id'],
            ],
            '\Numbers\Users\Users\Model\User\APIs' => [
                'name' => 'UM APIs',
                'pk' => ['um_usrapi_tenant_id', 'um_usrapi_user_id', 'um_usrapi_module_id', 'um_usrapi_resource_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrapi_tenant_id', 'um_user_id' => 'um_usrapi_user_id'],
                'details' => [
                    '\Numbers\Users\Users\Model\User\API\Methods' => [
                        'name' => 'UM API Methods',
                        'pk' => ['um_usrapmethod_tenant_id', 'um_usrapmethod_user_id', 'um_usrapmethod_module_id', 'um_usrapmethod_resource_id', 'um_usrapmethod_method_code'],
                        'type' => '1M',
                        'map' => ['um_usrapi_tenant_id' => 'um_usrapmethod_tenant_id', 'um_usrapi_user_id' => 'um_usrapmethod_user_id', 'um_usrapi_module_id' => 'um_usrapmethod_module_id', 'um_usrapi_resource_id' => 'um_usrapmethod_resource_id'],
                    ]
                ]
            ],
            '\Numbers\Users\Users\Model\User\IntegrationMappings' => [
                'name' => 'UM Integration Mappings',
                'pk' => ['um_usrintegmap_tenant_id', 'um_usrintegmap_user_id', 'um_usrintegmap_integtype_code', 'um_usrintegmap_code'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrintegmap_tenant_id', 'um_user_id' => 'um_usrintegmap_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Policy\Policies' => [
                'name' => 'UM Role Policies',
                'pk' => ['um_usrpolicy_tenant_id', 'um_usrpolicy_user_id', 'um_usrpolicy_sm_policy_tenant_id', 'um_usrpolicy_sm_policy_code'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrpolicy_tenant_id', 'um_user_id' => 'um_usrpolicy_user_id']
            ],
            '\Numbers\Users\Users\Model\User\Policy\Groups' => [
                'name' => 'UM Role Policy Groups',
                'pk' => ['um_usrpolgrp_tenant_id', 'um_usrpolgrp_user_id', 'um_usrpolgrp_sm_polgroup_tenant_id', 'um_usrpolgrp_sm_polgroup_id'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'um_usrpolgrp_tenant_id', 'um_user_id' => 'um_usrpolgrp_user_id']
            ],
            '\Numbers\Users\Users\Model\Users\0Virtual0\Widgets\Addresses' => [
                'name' => 'UM Addresses',
                'pk' => ['wg_address_tenant_id', 'wg_address_user_id', 'wg_address_type_code'],
                'type' => '1M',
                'map' => ['um_user_tenant_id' => 'wg_address_tenant_id', 'um_user_id' => 'wg_address_user_id'],
            ]
        ]
    ];
}
