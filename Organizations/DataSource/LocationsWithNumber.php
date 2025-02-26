<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\DataSource;

use Numbers\Users\Organizations\Model\Locations;
use Object\DataSource;

class LocationsWithNumber extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['on_location_id'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $column_prefix = 'on_location_';

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $options_map = [
        'on_location_number' => 'name',
        'on_location_name' => 'name',
        'on_location_inactive' => 'inactive',
    ];
    public $options_active = [
        'on_location_inactive' => 0
    ];

    public $parameters = [
        'on_location_customer_id' => ['name' => 'Customer #', 'domain' => 'customer_id', 'required' => true],
    ];

    public function query($parameters, $options = [])
    {
        $this->query = Locations::queryBuilderStatic(['skip_acl' => true]);
        // columns
        $this->query->columns([
            'on_location_id' => 'a.on_location_id',
            'on_location_name' => 'a.on_location_name',
            'on_location_number' => "a.on_location_number",
            'on_location_inactive' => 'a.on_location_inactive'
        ]);
        $this->query->where('AND', ['a.on_location_customer_id', '=', $parameters['on_location_customer_id']]);
    }
}
