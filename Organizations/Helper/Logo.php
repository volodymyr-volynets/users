<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Helper;

use Numbers\Users\Documents\Base\Base;
use Numbers\Users\Organizations\Model\Organizations;

class Logo
{
    /**
     * Get URL
     */
    public static function getURL()
    {
        $organizations = Organizations::getStatic([
            'pk' => ['on_organization_id']
        ]);
        $file_id = null;
        if (count($organizations) == 1) {
            $temp = current($organizations);
            $file_id = $temp['on_organization_logo_file_id'];
        } elseif (\User::get('organization_id')) {
            $file_id = $organizations[\User::get('organization_id')]['on_organization_logo_file_id'];
        } elseif (\I18n::$options['organization_id']) {
            $file_id = $organizations[\I18n::$options['organization_id']]['on_organization_logo_file_id'];
        }
        if (!empty($file_id)) {
            return Base::generateURL($file_id, true);
        }
    }

    /**
     * Get URL
     */
    public static function getName()
    {
        $organizations = Organizations::getStatic([
            'pk' => ['on_organization_id']
        ]);
        if (count($organizations) == 1) {
            $temp = current($organizations);
            return $temp['on_organization_name'];
        } elseif (\User::get('organization_id')) {
            return $organizations[\User::get('organization_id')]['on_organization_name'];
        } elseif (\I18n::$options['organization_id']) {
            return $organizations[\I18n::$options['organization_id']]['on_organization_name'];
        }
        return ' ';
    }
}
