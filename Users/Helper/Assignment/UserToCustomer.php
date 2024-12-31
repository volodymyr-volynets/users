<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Helper\Assignment;

class UserToCustomer
{
    /**
     * Render list
     *
     * @param array $user_id
     */
    public static function renderList($user_id)
    {
        $data = \Numbers\Users\Users\DataSource\Assignment\UserToCustomer::getStatic([
            'where' => [
                'user_id' => $user_id,
            ]
        ]);
        $inner_table = ['options' => [], 'width' => '100%'];
        $inner_table['header'] = [
            'Organization' => i18n(null, 'Organization'),
            'Customer' => i18n(null, 'Customer'),
        ];
        foreach ($data as $k => $v) {
            $inner_table['options'][$k]['Organization'] = ['value' => i18n(null, $v['organization_name']), 'align' => 'left', 'width' => '35%', 'tag' => 'td'];
            $inner_table['options'][$k]['Customer'] = ['value' => i18n(null, $v['customer_name']), 'align' => 'left', 'width' => '65%', 'tag' => 'td'];
        }
        return \HTML::table($inner_table);
    }
}
