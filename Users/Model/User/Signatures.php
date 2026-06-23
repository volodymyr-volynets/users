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

class Signatures extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M User Signatures';
    public $name = 'um_user_signatures';
    public $pk = ['um_usrsign_tenant_id', 'um_usrsign_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_usrsign_';
    public $columns = [
        'um_usrsign_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_usrsign_id' => ['name' => 'Signature #', 'domain' => 'signature_id_sequence'],
        'um_usrsign_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_usrsign_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'um_usrsign_module_code' => ['name' => 'Module Code', 'domain' => 'module_code'],
        'um_usrsign_content_wysiwyg' => ['name' => 'Content (wysiwyg)', 'domain' => 'content'],
        'um_usrsign_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_user_signatures_pk' => ['type' => 'pk', 'columns' => ['um_usrsign_tenant_id', 'um_usrsign_id']],
        'um_usrsign_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrsign_tenant_id', 'um_usrsign_user_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Users',
            'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
        ],
        'um_usrsign_module_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_usrsign_module_code'],
            'foreign_model' => '\Numbers\Backend\System\Modules\Model\Modules',
            'foreign_columns' => ['sm_module_code']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = true;
    public $options_map = [
        'um_usrsign_name' => 'name',
        'um_usrsign_inactive' => 'inactive',
    ];
    public $options_active = [
        'um_usrsign_inactive' => 0,
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
