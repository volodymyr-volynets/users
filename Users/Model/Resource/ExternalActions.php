<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Resource;

use Object\Table;
use Helper\Tree;

class ExternalActions extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M External Actions';
    public $name = 'um_external_actions';
    public $pk = ['um_extactn_tenant_id', 'um_extactn_id'];
    public $tenant = true;
    public $orderby = ['um_extactn_order' => SORT_ASC];
    public $limit;
    public $column_prefix = 'um_extactn_';
    public $columns = [
        'um_extactn_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_extactn_id' => ['name' => 'Action #', 'domain' => 'action_id_sequence'],
        'um_extactn_code' => ['name' => 'Code', 'domain' => 'code'],
        'um_extactn_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_extactn_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'um_extactn_parent_um_extactn_id' => ['name' => 'Parent #', 'domain' => 'action_id', 'null' => true],
        'um_extactn_prohibitive' => ['name' => 'Prohibitive', 'type' => 'boolean'],
        'um_extactn_order' => ['name' => 'Order', 'domain' => 'order', 'default' => 10000],
        'um_extactn_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
    ];
    public $constraints = [
        'um_external_actions_pk' => ['type' => 'pk', 'columns' => ['um_extactn_tenant_id', 'um_extactn_id']],
        'um_extactn_code_un' => ['type' => 'unique', 'columns' => ['um_extactn_tenant_id', 'um_extactn_code']],
        'um_extactn_parent_um_extactn_id_fk' => [
            'type' => 'fk',
            'columns' => ['um_extactn_tenant_id', 'um_extactn_parent_um_extactn_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\ExternalActions',
            'foreign_columns' => ['um_extactn_tenant_id', 'um_extactn_id'],
        ]
    ];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = false;
    public $options_map = [
        'um_extactn_name' => 'name',
        'um_extactn_name*' => 'avatar_circle_small',
        'um_extactn_parent_um_extactn_id' => 'parent',
        'um_extactn_order' => 'order',
        'um_extactn_inactive' => 'inactive'
    ];
    public $options_active = [
        'um_extactn_inactive' => 0
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'public',
        'protection' => 0,
        'scope' => 'global'
    ];

    /**
     * @see $this->options()
     */
    public function optionsGrouped($options = [])
    {
        $result = $this->options($options);
        if (!empty($result)) {
            $converted = Tree::convertByParent($result, 'parent');
            $result = [];
            Tree::convertTreeToOptionsMulti($converted, 0, ['name_field' => 'name'], $result);
        }
        return $result;
    }
}
