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

class Invites extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M User Invites';
    public $schema;
    public $name = 'um_user_invites';
    public $pk = ['um_usrinv_tenant_id', 'um_usrinv_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_usrinv_';
    public $columns = [
        'um_usrinv_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_usrinv_id' => ['name' => 'Invite #', 'domain' => 'invite_id_sequence'],
        'um_usrinv_code' => ['name' => 'User Number', 'domain' => 'group_code', 'null' => true],
        'um_usrinv_type_id' => ['name' => 'Type', 'domain' => 'type_id', 'options_model' => Types::class],
        'um_usrinv_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_usrinv_company' => ['name' => 'Company', 'domain' => 'name', 'null' => true],
        'um_usrinv_title' => ['name' => 'Title', 'domain' => 'personal_title', 'null' => true],
        'um_usrinv_first_name' => ['name' => 'First Name', 'domain' => 'personal_name', 'null' => true],
        'um_usrinv_last_name' => ['name' => 'Last Name', 'domain' => 'personal_name', 'null' => true],
        'um_usrinv_email' => ['name' => 'Primary Email', 'domain' => 'email', 'null' => true],
        'um_usrinv_phone' => ['name' => 'Primary Phone', 'domain' => 'phone', 'null' => true],
        'um_usrinv_invite_message' => ['name' => 'Invite Message', 'domain' => 'message', 'null' => true],
        'um_usrinv_created_user_id' => ['name' => 'Created User #', 'domain' => 'user_id', 'null' => true],
        'um_usrinv_referral_user_id' => ['name' => 'Referral User #', 'domain' => 'user_id', 'null' => true],
        'um_usrinv_assignusrtype_code' => ['name' => 'Assignment Type Code', 'domain' => 'type_code', 'null' => true],
        'um_usrinv_other_json_params' => ['name' => 'Other Params', 'type' => 'json', 'null' => true],
        'um_usrinv_require_address' => ['name' => 'Require Address', 'type' => 'boolean'],
        'um_usrinv_require_assignment' => ['name' => 'Require Assignment', 'type' => 'boolean'],
        'um_usrinv_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $column_settings = [];
    public $constraints = [
        'um_user_invites_pk' => ['type' => 'pk', 'columns' => ['um_usrinv_tenant_id', 'um_usrinv_id']]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = true;
    public $options_map = [
        'um_usrinv_name' => 'name',
        'um_usrinv_company' => 'name',
        'um_usrinv_inactive' => 'inactive',
    ];
    public $options_active = [
        'um_usrinv_inactive' => 0
    ];
    public $options_skip_i18n = true;
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = true;

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
