<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\DataSource\Credential;

use Object\DataSource;

class MyPasswords extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['um_mypasswd_id'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $options_map = [];
    public $options_active = [];
    public $column_prefix = 'um_mypasswd_';

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Users\Users\Model\Credential\MyPasswords';
    public $parameters = [
        'um_mypasswd_id' => ['name' => 'Password #', 'domain' => 'password_id'],
    ];

    public function query($parameters, $options = [])
    {
        $this->query->columns([
            'um_mypasswd_id' => 'a.um_mypasswd_id'
        ]);
        $this->query->where('AND', ['a.um_mypasswd_inserted_user_id', '=', \User::getUser() ?? \User::id()]);
    }
}
