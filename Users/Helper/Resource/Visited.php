<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Helper\Resource;

class Visited
{
    /**
     * Merge
     *
     * @param string $url
     * @param int $user_id
     * @param array $menu_item
     * @return void
     */
    public static function merge(string $url, int $user_id, array $menu_item): void
    {
        $found = \Numbers\Users\Users\Model\User\Resource\Visited::getStatic([
            'where' => [
                'um_usrresvisit_tenant_id' => \Tenant::id(),
                'um_usrresvisit_user_id' => $user_id,
                'um_usrresvisit_url' => $url,
            ],
            'columns' => ['um_usrresvisit_tenant_id', 'um_usrresvisit_id', 'um_usrresvisit_counter'],
            'limit' => 1,
            'single_row' => true,
        ]);
        if ($found) {
            $found = current($found);
            $found['um_usrresvisit_counter']++;
            \Numbers\Users\Users\Model\User\Resource\Visited::collectionStatic()->touch($found, ['updated']);
        } else {
            \Numbers\Users\Users\Model\User\Resource\Visited::collectionStatic()->merge([
                'um_usrresvisit_tenant_id' => \Tenant::id(),
                'um_usrresvisit_user_id' => $user_id,
                'um_usrresvisit_url' => $url,
                'um_usrresvisit_counter' => 1,
                'um_usrresvisit_updated_timestamp' => \Format::now('timestamp'),
                // name, desciption, module, icon
                'um_usrresvisit_name' => $menu_item['name'],
                'um_usrresvisit_description' => $menu_item['description'],
                'um_usrresvisit_module_code' => $menu_item['module_code'],
                'um_usrresvisit_icon' => $menu_item['icon'],
            ]);
        }
    }
}
