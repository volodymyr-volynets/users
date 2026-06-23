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

class Tools extends Import
{
    public $data = [
        'groups' => [
            'options' => [
                'pk' => ['ai_group_tenant_id', 'ai_group_code'],
                'model' => '\Numbers\AI\SDK\Model\Groups',
                'method' => 'save',
                'submodule_exists' => ['Numbers.AI.SDK']
            ],
            'data' => [
                [
                    'ai_group_tenant_id' => null,
                    'ai_group_code' => 'UM::DEFAULT_GROUP',
                    'ai_group_name' => 'U/M Default Groups',
                    'ai_group_module_code' => 'UM',
                    'ai_group_inactive' => 0,
                ],
            ]
        ],
        'tools' => [
            'options' => [
                'pk' => ['ai_tool_tenant_id', 'ai_tool_code'],
                'model' => '\Numbers\AI\SDK\Model\Collection\Tools',
                'method' => 'save',
                'submodule_exists' => ['Numbers.AI.SDK']
            ],
            'data' => [
                [
                    'ai_tool_tenant_id' => null,
                    'ai_tool_code' => 'UM::USERS_FETCH_BY_ID_TOOL',
                    'ai_tool_name' => 'U/M Users Fetch By ID Tool',
                    'ai_tool_description' => 'Use this tool to fetch user profile based on a set of conditions.',
                    'ai_tool_tool_model' => '\Numbers\Users\Users\AI\Tool\UMUsersFetchByIDTool',
                    'ai_tool_tool_name' => 'um_users_fetch_by_id',
                    'ai_tool_inactive' => 0,
                    '\Numbers\AI\SDK\Model\Tool\Groups' => [
                        [
                            'ai_tolgrp_ai_group_code' => 'UM::DEFAULT_GROUP',
                            'ai_tolgrp_inactive' => 0,
                        ]
                    ]
                ],
                [
                    'ai_tool_tenant_id' => null,
                    'ai_tool_code' => 'UM::USERS_CHECK_EMAIL_PHONE',
                    'ai_tool_name' => 'U/M Users Check Email & Phone Sub Form Tool',
                    'ai_tool_description' => <<<TEXT
Tool: um_users_check_email_phone_subform_tool

Description:
Opens Users Check Email & Phone Form

When to use:
When you want to collect/update Users Email and Phone.

How to use:
1. Open the Users Check Email & Phone form with a specific context.
2. Subform would collect user phone and email and would return summary.

Returns:
- Summary of the fields provided by users.
TEXT,
                    'ai_tool_tool_model' => '\Numbers\Users\Users\AI\Tool\UMUsersCheckEmailPhoneSubFormTool',
                    'ai_tool_tool_name' => 'um_users_check_email_phone_subform_tool',
                    'ai_tool_is_rag' => 0,
                    'ai_tool_is_form' => 1,
                    'ai_tool_form_settings_json' => [
                        "link" => "um_users_check_email_phone_subform",
                        "form" => "\Numbers\Users\Users\AI\Form\UMUsersCheckEmailPhoneSubForm",
                        "label_name" => "U/M Users Check Email & Phone Sub Form",
                        "icon" => "fa-solid fa-users"
                    ],
                    'ai_tool_inactive' => 0,
                    '\Numbers\AI\SDK\Model\Tool\Groups' => [
                        [
                            'ai_tolgrp_ai_group_code' => 'UM::DEFAULT_GROUP',
                            'ai_tolgrp_inactive' => 0,
                        ]
                    ]
                ],
            ]
        ],
    ];
}
