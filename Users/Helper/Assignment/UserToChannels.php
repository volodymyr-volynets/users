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

use Numbers\Users\Users\Model\Channel\Types;

class UserToChannels
{
    /**
     * Render list
     *
     * @param array $user_id
     */
    public static function renderList($user_id, $organizations, $roles, $teams, $groups)
    {
        $types = Types::optionsStatic();
        $data = \Numbers\Users\Users\DataSource\Assignment\UserToChannels::getStatic([
            'where' => [
                'user_id' => $user_id,
                'organizations' => $organizations,
                'roles' => $roles,
                'teams' => $teams,
                'groups' => $groups,
            ]
        ]);
        //return print_r2($data, '', true);
        $inner_table = ['options' => [], 'width' => '100%'];
        $inner_table['header'] = [
            'code' => i18n(null, 'Code'),
            'type' => i18n(null, 'Type'),
            'name' => i18n(null, 'Name'),
            'field_id' => i18n(null, 'Field #'),
            'field_code' => i18n(null, 'Field Code'),
        ];
        foreach ($data as $k => $v) {
            $inner_table['options'][$k]['code'] = ['value' => $v['code'], 'align' => 'left', 'width' => '25%', 'tag' => 'td'];
            $inner_table['options'][$k]['type'] = ['value' => $types[$v['type']]['name'], 'align' => 'left', 'width' => '15%', 'tag' => 'td'];
            $inner_table['options'][$k]['name'] = ['value' => $v['name'], 'align' => 'left', 'width' => '30%', 'tag' => 'td'];
            $inner_table['options'][$k]['field_id'] = ['value' => $v['field_id'], 'align' => 'left', 'width' => '15%', 'tag' => 'td'];
            $inner_table['options'][$k]['field_code'] = ['value' => $v['field_code'], 'align' => 'left', 'width' => '15%', 'tag' => 'td'];
        }
        return \HTML::table($inner_table);
    }
}
