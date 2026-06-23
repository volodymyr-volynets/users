<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Helper;

use Numbers\Users\Users\Model\User\AssignmentsAR;
use Numbers\Users\Users\Model\RolesAR;

class Assignments
{
    /**
     * Link users
     *
     * @param string $um_assignusrtype_code
     * @param string $um_role_code
     * @param int $um_user_referral_user_id
     * @param int $um_user_user_id
     * @return array
     */
    public static function linkUsers(string $um_assignusrtype_code, string $um_role_code, int $um_user_referral_user_id, int $um_user_user_id): array
    {
        $assignments_ar = new AssignmentsAR();
        $roles_ar = new RolesAR();
        // create two way assignments
        $data = [
            'um_usrassign_tenant_id' => \Tenant::id(),
            'um_usrassign_assignusrtype_id' => current($assignments_ar->loadIDByCode($um_assignusrtype_code)),
            'um_usrassign_parent_role_id' => current($roles_ar->loadIDByCode($um_role_code)),
            'um_usrassign_parent_user_id' => $um_user_referral_user_id,
            'um_usrassign_child_role_id' => current($roles_ar->loadIDByCode($um_role_code)),
            'um_usrassign_child_user_id' => $um_user_user_id,
            'um_usrassign_inactive' => 0
        ];
        $assignment_result = $assignments_ar->fill($data)
            ->merge();
        if (!$assignment_result['success']) {
            return $assignment_result;
        }
        $data['um_usrassign_parent_user_id'] = $um_user_user_id;
        $data['um_usrassign_child_user_id'] = $um_user_referral_user_id;
        $assignment_result = $assignments_ar->fill($data)
            ->merge();
        if (!$assignment_result['success']) {
            return $assignment_result;
        }
        return [
            'success' => true,
            'error' => [],
        ];
    }
}
