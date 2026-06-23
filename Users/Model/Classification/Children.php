<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Classification;

use Object\Table;

class Children extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M Classification Children';
    public $name = 'um_classification_children';
    public $pk = ['um_clscls_tenant_id', 'um_clscls_parent_um_classification_id', 'um_clscls_child_um_classification_id'];
    public $tenant = true;
    public $orderby = [
        'um_clscls_timestamp' => SORT_ASC
    ];
    public $limit;
    public $column_prefix = 'um_clscls_';
    public $columns = [
        'um_clscls_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_clscls_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
        'um_clscls_um_classtype_code' => ['name' => 'Type', 'domain' => 'group_code'],
        'um_clscls_parent_um_classification_id' => ['name' => 'Parent Classification #', 'domain' => 'classification_id'],
        'um_clscls_child_um_classification_id' => ['name' => 'Child Classification #', 'domain' => 'classification_id'],
        'um_clscls_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_classification_children_pk' => ['type' => 'pk', 'columns' => ['um_clscls_tenant_id', 'um_clscls_parent_um_classification_id', 'um_clscls_child_um_classification_id']],
        'um_clscls_parent_um_classification_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_clscls_tenant_id', 'um_clscls_parent_um_classification_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Classifications',
            'foreign_columns' => ['um_classification_tenant_id', 'um_classification_id']
        ],
        'um_clscls_child_um_classification_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_clscls_tenant_id', 'um_clscls_child_um_classification_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Classifications',
            'foreign_columns' => ['um_classification_tenant_id', 'um_classification_id']
        ],
        'um_clscls_um_classtype_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_clscls_tenant_id', 'um_clscls_um_classtype_code'],
            'foreign_model' => '\Numbers\Users\Users\Model\Classification\Types',
            'foreign_columns' => ['um_classtype_tenant_id', 'um_classtype_code']
        ]
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
