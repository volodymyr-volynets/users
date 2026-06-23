<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\DataSource;

use Object\DataSource;

class UsersCodes extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['um_user_code'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $options_map = [
        'um_user_name' => 'name',
        'um_user_code' => 'name',
        'um_user_inactive' => 'inactive'
    ];
    public $options_active = [
        'um_user_inactive' => 0
    ];
    public $column_prefix = 'um_user_';

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Users\Users\Model\Users';
    public $parameters = [
        'user_type' => ['name' => 'User Type', 'domain' => 'type_id', 'multiple_column' => true],
    ];

    public function query($parameters, $options = [])
    {
        $this->query->columns([
            'um_user_id' => 'a.um_user_id',
            'um_user_code' => 'a.um_user_code',
            'um_user_name' => 'a.um_user_name',
            'um_user_company' => 'a.um_user_company',
            'um_user_photo_file_id' => 'a.um_user_photo_file_id',
            'um_user_inactive' => 'a.um_user_inactive'
        ]);
        if (!empty($parameters['user_type'])) {
            $this->query->where('AND', ['a.um_user_type_id', '=', $parameters['user_type']]);
        }
    }
}
