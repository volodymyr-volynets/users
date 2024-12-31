<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User\Assignment\Customer;

use Object\Table;

class Customers extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Assignment Customers';
    public $name = 'um_user_assignment_customers';
    public $pk = ['um_assigncustomer_tenant_id', 'um_assigncustomer_user_id', 'um_assigncustomer_organization_id', 'um_assigncustomer_customer_id'];
    public $tenant = true;
    public $orderby = [
        'um_assigncustomer_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_assigncustomer_';
    public $columns = [
        'um_assigncustomer_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_assigncustomer_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_assigncustomer_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'um_assigncustomer_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
        'um_assigncustomer_customer_id' => ['name' => 'Customer #', 'domain' => 'customer_id'],
        'um_assigncustomer_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_user_assignment_customers_pk' => ['type' => 'pk', 'columns' => ['um_assigncustomer_tenant_id', 'um_assigncustomer_user_id', 'um_assigncustomer_organization_id', 'um_assigncustomer_customer_id']],
        'um_assigncustomer_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_assigncustomer_tenant_id', 'um_assigncustomer_user_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Users',
            'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
        ],
        'um_assigncustomer_organization_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_assigncustomer_tenant_id', 'um_assigncustomer_organization_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Organizations',
            'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
        ],
        'um_assigncustomer_customer_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_assigncustomer_tenant_id', 'um_assigncustomer_customer_id'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Customers',
            'foreign_columns' => ['on_customer_tenant_id', 'on_customer_id']
        ],
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $options_map = [];
    public $options_active = [];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
