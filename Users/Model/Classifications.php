<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model;

use Object\Table;

class Classifications extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Classifications';
    public $name = 'um_classifications';
    public $pk = ['um_classification_tenant_id', 'um_classification_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_classification_';
    public $columns = [
        'um_classification_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_classification_id' => ['name' => 'Team #', 'domain' => 'classification_id_sequence'],
        'um_classification_um_classtype_code' => ['name' => 'Type', 'domain' => 'group_code'],
        'um_classification_code' => ['name' => 'Code', 'domain' => 'group_code', 'null' => true],
        'um_classification_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_classification_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'um_classification_weight' => ['name' => 'Weight', 'domain' => 'weight', 'null' => true], // based on this field priorities would be set
        'um_classification_global' => ['name' => 'Global', 'type' => 'boolean'],
        'um_classification_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_classifications_pk' => ['type' => 'pk', 'columns' => ['um_classification_tenant_id', 'um_classification_id']],
        'um_classification_code_un' => ['type' => 'unique', 'columns' => ['um_classification_tenant_id', 'um_classification_code']],
        'um_classification_um_classtype_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_classification_tenant_id', 'um_classification_um_classtype_code'],
            'foreign_model' => '\Numbers\Users\Users\Model\Classification\Types',
            'foreign_columns' => ['um_classtype_tenant_id', 'um_classtype_code']
        ]
    ];
    public $indexes = [
        'um_user_classifications_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_classification_name']]
    ];
    public $history = false;
    public $audit = [
        'map' => [
            'um_classification_tenant_id' => 'wg_audit_tenant_id',
            'um_classification_id' => 'wg_audit_um_classification_id'
        ]
    ];
    public $options_map = [
        'um_classification_name' => 'name',
        'um_classification_name*' => 'avatar_circle_small',
        'um_classification_inactive' => 'inactive',
        'um_classification_icon' => 'icon_class',
    ];
    public $options_active = [
        'um_classification_inactive' => 0
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

    public $scoped_attributes = [
        'column_key' => 'um_classification_id',
        'column_pk_type' => 'int',
        'column_name' => 'U/M Classification #',
    ];
}
