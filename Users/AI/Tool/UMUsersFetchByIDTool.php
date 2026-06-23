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
use Numbers\Users\Users\Model\Users;

class UMUsersFetchByIDTool extends BaseTool
{
    public string $name = 'um_users_fetch_by_id';
    public function description(): string
    {
        return 'Use this too to fetch user profile based on a set of conditions.';
    }
    public function run(array $input): array
    {
        $result = Users::getSingleStatic([
            'where' => [
                'um_user_tenant_id' => \Tenant::id(),
                'um_user_id' => $input['um_user_id'],
            ]
        ]);
        unset($result['um_user_login_password']);
        unset($result['um_user_last_mfa_code']);
        unset($result['um_user_totp_encrypted']);
        return $result;
    }
    public function schema(): array
    {
        return [
            'um_user_id' => ['required' => true, 'name' => 'User #', 'domain' => 'user_id'],
        ];
    }
}
