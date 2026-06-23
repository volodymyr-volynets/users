<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\User;

use Object\Table;

class Alerts extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M User Alerts';
    public $name = 'um_user_alerts';
    public $pk = ['um_usralert_tenant_id', 'um_usralert_id'];
    public $tenant = true;
    public $orderby = [
        'um_usralert_id' => SORT_DESC
    ];
    public $limit;
    public $column_prefix = 'um_usralert_';
    public $columns = [
        'um_usralert_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_usralert_id' => ['name' => 'Alert #', 'domain' => 'big_id_sequence'],
        'um_usralert_um_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'um_usralert_um_usralrttype_code' => ['name' => 'Type Code', 'domain' => 'group_code', 'options_model' => '\Numbers\Users\Users\Model\User\Alert\UserAlertTypes'],
        'um_usralert_record_id' => ['name' => 'Record #', 'domain' => 'big_id', 'null' => true],
        'um_usralert_record_code' => ['name' => 'Record Code', 'domain' => 'code', 'null' => true],
        'um_usralert_description' => ['name' => 'Name', 'domain' => 'description', 'null' => true],
        'um_usralert_body' => ['name' => 'Body', 'domain' => 'description', 'null' => true],
        'um_usralert_loc_json' => ['name' => 'Localization (JSON)', 'type' => 'json', 'null' => true],
        'um_usralert_url' => ['name' => 'URL', 'domain' => 'url', 'null' => true],
        'um_usralert_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
    ];
    public $constraints = [
        'um_user_alerts_pk' => ['type' => 'pk', 'columns' => ['um_usralert_tenant_id', 'um_usralert_id']],
        'um_usralert_um_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usralert_tenant_id', 'um_usralert_um_user_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Users',
            'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
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

    public $who = [
        'inserted' => true,
        'updated' => true
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
