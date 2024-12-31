<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\DataSource\User;

use Numbers\Users\Users\Model\Users;
use Object\DataSource;

class Password extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['um_user_id'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row = true;
    public $single_value;
    public $options_map = [];
    public $column_prefix;

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model;
    public $parameters = [
        'user_id' => ['name' => 'User #', 'domain' => 'user_id', 'required' => true],
    ];

    public function query($parameters, $options = [])
    {
        // create a query object
        $this->query = Users::queryBuilderStatic([
            'alias' => 'a',
            'skip_acl' => true
        ])->select();
        // columns
        $this->query->columns([
            'a.um_user_id',
            'a.um_user_email',
            'a.um_user_login_username',
            'a.um_user_login_password',
            'a.um_user_login_last_set'
        ]);
        // where
        $this->query->where('AND', ['a.um_user_login_enabled', '=', 1]);
        $this->query->where('AND', ['a.um_user_inactive', '=', 0]);
        $this->query->where('AND', ['a.um_user_id', '=', (int) $parameters['user_id']]);
    }
}
