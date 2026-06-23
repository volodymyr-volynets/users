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

use Object\DataSource;

class Assignments extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['code'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $options_map = [
        'name' => 'name',
        'inactive' => 'inactive'
    ];
    public $options_active = [
        'inactive' => 0
    ];
    public $column_prefix;

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Users\Users\Model\User\Assignment\Types';
    public $parameters = [];

    public function query($parameters, $options = [])
    {
        // columns
        $this->query->columns([
            'code' => 'a.um_assignusrtype_code',
            'name' => 'a.um_assignusrtype_name',
            'inactive' => 'a.um_assignusrtype_inactive'
        ]);
    }
}
