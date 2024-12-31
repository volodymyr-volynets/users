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

use Numbers\Countries\Countries\Model\Countries;
use Numbers\Countries\Countries\Model\Provinces;
use Numbers\Users\Organizations\Model\Locations;
use Object\DataSource;

class LocationsWithAddress extends DataSource
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
        'on_location_address' => 'text_extension',
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
            'on_location_inactive' => 'a.on_location_inactive',
            'on_location_address' => "concat_ws(', ', c.wg_address_address1, c.wg_address_address2, c.wg_address_city, c2.cm_province_name, c3.cm_country_name, wg_address_postal_code)"
        ]);
        $location_addresses_model = \Factory::model('\Numbers\Users\Organizations\Model\Locations\0Virtual0\Widgets\Addresses');
        $this->query->join('LEFT', $location_addresses_model, 'c', 'ON', [
            ['AND', ['c.wg_address_primary', '=', 1, false], false],
            ['AND', ['c.wg_address_location_id', '=', 'a.on_location_id', true], false],
        ]);
        $this->query->join('LEFT', new Provinces(), 'c2', 'ON', [
            ['AND', ['c.wg_address_country_code', '=', 'c2.cm_province_country_code', true], false],
            ['AND', ['c.wg_address_province_code', '=', 'c2.cm_province_province_code', true], false],
        ]);
        $this->query->join('LEFT', new Countries(), 'c3', 'ON', [
            ['AND', ['c.wg_address_country_code', '=', 'c3.cm_country_code', true], false],
        ]);
        $this->query->where('AND', ['a.on_location_customer_id', '=', $parameters['on_location_customer_id']]);
    }
}
