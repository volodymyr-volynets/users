<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\DataSource\Assignment;

use Numbers\Users\Organizations\Model\Customers;
use Numbers\Users\Organizations\Model\Organizations;
use Object\DataSource;

class UserToCustomer extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['customer_id'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $options_map = [];
    public $options_active = [];
    public $column_prefix;

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Users\Users\Model\User\Assignment\Customer\Customers';
    public $parameters = [
        'user_id' => ['name' => 'User #', 'domain' => 'user_id', 'required' => true],
    ];

    public function query($parameters, $options = [])
    {
        // columns
        $this->query->columns([
            'customer_id' => 'a.um_assigncustomer_customer_id',
            'customer_name' => 'b.on_customer_name',
            'organization_id' => 'a.um_assigncustomer_organization_id',
            'organization_name' => 'c.on_organization_name',
        ]);
        $this->query->join('INNER', new Customers(), 'b', 'ON', [
            ['AND', ['b.on_customer_id', '=', 'a.um_assigncustomer_customer_id', true], false]
        ]);
        $this->query->join('INNER', new Organizations(), 'c', 'ON', [
            ['AND', ['c.on_organization_id', '=', 'a.um_assigncustomer_organization_id', true], false]
        ]);
        $this->query->where('AND', ['a.um_assigncustomer_user_id', '=', $parameters['user_id']]);
        $this->query->orderby(['c.on_organization_name' => SORT_ASC, 'b.on_customer_name' => SORT_ASC]);
    }
}
