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

class UserToUser
{
    /**
     * Render list
     *
     * @param array $user_id
     */
    public static function renderList($user_id)
    {
        $data = \Numbers\Users\Users\DataSource\Assignment\UserToUser::getStatic([
            'where' => [
                'user_id' => $user_id,
            ]
        ]);
        $inner_table = ['options' => [], 'width' => '100%'];
        $inner_table['header'] = [
            'type' => i18n(null, 'Type'),
            'users' => i18n(null, 'User(s)'),
        ];
        foreach ($data as $k => $v) {
            $assignment_name = current($v);
            if (!empty($assignment_name['reverse'])) {
                $assignment_name['assignment_name'] .= ' (' . i18n(null, 'Reverse') . ')';
            }
            $users = [];
            foreach ($v as $k2 => $v2) {
                $users[] = $v2['user_name'] . ' (' . $v2['user_id'] . ')';
            }
            $inner_table['options'][$k . '::' . $k2]['type'] = ['value' => i18n(null, $assignment_name['assignment_name']), 'align' => 'left', 'width' => '35%', 'tag' => 'td'];
            $inner_table['options'][$k . '::' . $k2]['users'] = ['value' => implode('<br/> ', $users), 'align' => 'left', 'width' => '65%', 'tag' => 'td'];
        }
        return \HTML::table($inner_table);
    }
}
