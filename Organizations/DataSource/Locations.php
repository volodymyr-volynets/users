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

use Object\DataSource;

class Locations extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['on_location_id'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row = true;
    public $single_value;
    public $column_prefix = 'on_location_';

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $options_map = [];
    public $options_active = [];

    public $primary_model = '\Numbers\Users\Organizations\Model\Locations';
    public $parameters = [
        'on_location_id' => ['name' => 'Location #', 'domain' => 'location_id', 'required' => true],
    ];

    public function query($parameters, $options = [])
    {
        // columns
        $this->query->columns([
            'on_location_id' => 'a.on_location_id',
            'on_location_name' => 'a.on_location_name',
            'on_location_number' => 'a.on_location_number',
            'on_location_address' => "concat_ws(', ', b.wg_address_address1, b.wg_address_address2, b.wg_address_city, b.wg_address_province_code, b.wg_address_postal_code)",
            'on_location_email' => 'a.on_location_email',
            'on_location_phone' => 'a.on_location_phone',
            'on_location_fax' => 'a.on_location_fax',
            'on_location_construction_date' => 'a.on_location_construction_date',
            'on_location_inactive' => 'a.on_location_inactive'
        ]);
        // join on primary address
        $model = new \Numbers\Users\Organizations\Model\Locations();
        $this->query->join('LEFT', \Factory::model($model->addresses_model), 'b', 'ON', [
            ['AND', ['a.on_location_id', '=', 'b.wg_address_location_id', true], false],
            ['AND', ['b.wg_address_primary', '=', 1, false], false],
        ]);
        $this->query->where('AND', ['a.on_location_id', '=', $parameters['on_location_id']]);
    }
}
