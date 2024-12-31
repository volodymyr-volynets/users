<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Organization;

use Helper\Tree;
use Object\Table;

class Types extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'ON';
    public $title = 'O/N Organization Types';
    public $name = 'on_organization_types';
    public $pk = ['on_orgtype_tenant_id', 'on_orgtype_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'on_orgtype_';
    public $columns = [
        'on_orgtype_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'on_orgtype_code' => ['name' => 'Type Code', 'domain' => 'type_code'],
        'on_orgtype_name' => ['name' => 'Name', 'domain' => 'name'],
        'on_orgtype_parent_type_code' => ['name' => 'Parent Type Code', 'domain' => 'type_code', 'null' => true],
        'on_orgtype_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'on_organization_types_pk' => ['type' => 'pk', 'columns' => ['on_orgtype_tenant_id', 'on_orgtype_code']],
        'on_orgtype_parent_type_code_fk' => [
            'type' => 'fk',
            'columns' => ['on_orgtype_tenant_id', 'on_orgtype_parent_type_code'],
            'foreign_model' => '\Numbers\Users\Organizations\Model\Organization\Types',
            'foreign_columns' => ['on_orgtype_tenant_id', 'on_orgtype_code']
        ]
    ];
    public $indexes = [
        'on_organization_types_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['on_orgtype_code', 'on_orgtype_name']]
    ];
    public $history = false;
    public $audit = [
        'map' => [
            'on_orgtype_tenant_id' => 'wg_audit_tenant_id',
            'on_orgtype_code' => 'wg_audit_orgtype_code'
        ]
    ];
    public $optimistic_lock = true;
    public $options_map = [
        'on_orgtype_name' => 'name',
        'on_orgtype_inactive' => 'inactive'
    ];
    public $options_active = [
        'on_orgtype_inactive' => 0
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

    /**
     * @see $this->options()
     */
    public function optionsGrouped($options = [])
    {
        $options['options_map'] = [
            'on_orgtype_name' => 'name',
            'on_orgtype_parent_type_code' => 'parent',
            'on_orgtype_inactive' => 'inactive'
        ];
        $result = $this->optionsActive($options);
        if (!empty($result)) {
            $converted = Tree::convertByParent($result, 'parent');
            $result = [];
            Tree::convertTreeToOptionsMulti($converted, 0, ['name_field' => 'name'], $result);
        }
        return $result;
    }
}
