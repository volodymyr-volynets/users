<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Helper\User;

use Numbers\Frontend\HTML\Renderers\Common\Helper\Colors;

class Personalizations
{
    /**
     * Get (static)
     *
     * @param mixed $um_user_id
     * @param string $module_code
     * @return array{data: array, error: array, success: bool}
     */
    public static function getStatic(mixed $um_user_id, string $module_code): array
    {
        $result = [
            'avatar_colors' => null,
            'photo_file_id' => null,
            'photo_file_url' => null,
            'um_usrsign_id' => null,
            'um_usrterm_id' => null,
            'um_user_name' => null,
            'data' => [],
        ];
        if (empty($um_user_id)) {
            return $result;
        }
        $existing = \Numbers\Users\Users\Model\User\Personalizations::getSingleStatic([
            'where' => [
                'um_usrpersonal_tenant_id' => \Tenant::id(),
                'um_usrpersonal_user_id' => $um_user_id,
                'um_usrpersonal_module_code' => $module_code
            ]
        ]);
        if (empty($existing)) {
            return $result;
        }
        $result['data'] = $existing;
        $result['avatar_colors'] = Colors::getColorsAndInitials($existing['um_usrpersonal_name']);
        $result['photo_file_id'] = $existing['um_usrpersonal_photo_file_id'];
        $result['photo_file_url'] = $existing['um_usrpersonal_photo_file_url'];
        $result['um_usrsign_id'] = $existing['um_usrpersonal_um_usrsign_id'];
        $result['um_usrterm_id'] = $existing['um_usrpersonal_um_usrterm_id'];
        $result['um_user_name'] = $existing['um_usrpersonal_name'];
        return $result;
    }
}
