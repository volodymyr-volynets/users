<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\DataSource\BusinessHours;

use Helper\Date;
use Object\DataSource;
use Object\Query\Builder;

class WithinBussinessHours extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk;
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $column_prefix;

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $options_map = [];
    public $options_active = [];

    public $primary_model;
    public $parameters = [
        'organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id', 'required' => true],
        'timestamp' => ['name' => 'Timestamp', 'type' => 'timestamp', 'required' => true],
    ];

    public function query($parameters, $options = [])
    {
        $this->query = Builder::quick()->select();
        $parameters['timestamp'] = $this->query->db_object->cast("'{$parameters['timestamp']}'", 'timestamp');
        $parameters['interval'] = $this->query->db_object->cast("'15 minutes'", 'interval');
        $this->query->columns([
            'next_date' => "on_calculate_business_time(" . \Tenant::id() . ", " . $parameters['organization_id'] . ", {$parameters['timestamp']}, {$parameters['interval']}, 1)",
        ]);
    }

    public function process($data, $options = [])
    {
        if (!empty($data[0]['next_date'])) {
            return Date::compare($data[0]['next_date'], $options['parameters']['timestamp'], 'datetime');
        }
        return false;
    }
}
