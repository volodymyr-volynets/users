<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\AI\Tool;

use Numbers\AI\SDK\Classes\Tool\BaseTool;

class UMUsersCheckEmailPhoneSubFormTool extends BaseTool
{
    public string $name = 'um_users_check_email_phone_subform_tool';
    public function description(): string
    {
        return <<<TEXT
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
TEXT;
    }
    public function run(array $input): array
    {
        return [
            'success' => true,
            'error' => [],
            'summary' => 'Not implemented yet!'
        ];
    }
    public function schema(): array
    {
        return [
            'um_user_id' => ['name' => 'U/M User #', 'domain' => 'user_id', 'required' => true],
        ];
    }
}
