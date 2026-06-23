<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\AI\Data;

use Object\Import;

class Phases extends Import
{
    public $data = [
        'groups' => [
            'options' => [
                'pk' => ['wg_phasestep_tenant_id', 'wg_phasestep_code'],
                'model' => '\Numbers\Users\Widgets\Phases\Model\Steps',
                'method' => 'save',
                'submodule_exists' => ['Numbers.Users.Users']
            ],
            'data' => [
                [
                    'wg_phasestep_tenant_id' => null,
                    'wg_phasestep_code' => 'UM::USERS_CHECK_EMAIL',
                    'wg_phasestep_name' => 'U/M Users Check Email & Phone',
                    'wg_phasestep_group' => 'N/F Admin',
                    'wg_phasestep_order' => 10000,
                    'wg_phasestep_wg_phasestptype_code' => 'FIELD_CHECK',
                    'wg_phasestep_um_ownertype_id' => '::id::NF_ADMIN',
                    'wg_phasestep_um_ownertype_code' => 'NF_ADMIN',
                    'wg_phasestep_settings_json' => [
                        'model' => '\Numbers\Users\Users\Model\Users',
                        'fields' => ['um_user_email', 'um_user_phone']
                    ],
                    'wg_phasestep_model' => '\Numbers\Users\Users\AI\Phase\UMUsersFieldCheck',
                    'wg_phasestep_sm_model_id' => '::id::\Numbers\Users\Users\Model\Users',
                    'wg_phasestep_sm_model_code' => '\Numbers\Users\Users\Model\Users',
                    'wg_phasestep_is_form' => 1,
                    'wg_phasestep_ai_tool_code' => 'UM::USERS_CHECK_EMAIL_PHONE',
                    'wg_phasestep_inactive' => 0,
                ],
                [
                    'wg_phasestep_tenant_id' => null,
                    'wg_phasestep_code' => 'UM::USERS_WELCOME',
                    'wg_phasestep_name' => 'U/M Users Welcome',
                    'wg_phasestep_group' => 'N/F Admin',
                    'wg_phasestep_order' => 10000,
                    'wg_phasestep_wg_phasestptype_code' => 'WELCOME',
                    'wg_phasestep_um_ownertype_id' => '::id::NF_ADMIN',
                    'wg_phasestep_um_ownertype_code' => 'NF_ADMIN',
                    'wg_phasestep_settings_json' => [],
                    'wg_phasestep_model' => '\Numbers\Users\Users\AI\Phase\UMUsersWelcome',
                    'wg_phasestep_sm_model_id' => '::id::\Numbers\Users\Users\Model\Users',
                    'wg_phasestep_sm_model_code' => '\Numbers\Users\Users\Model\Users',
                    'wg_phasestep_is_form' => 0,
                    'wg_phasestep_ai_tool_code' => null,
                    'wg_phasestep_inactive' => 0,
                ],
            ]
        ],
    ];
}
