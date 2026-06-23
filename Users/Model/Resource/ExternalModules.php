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

class ExternalModules extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M External Modules';
    public $name = 'um_external_modules';
    public $pk = ['um_extmdl_tenant_id', 'um_extmdl_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_extmdl_';
    public $columns = [
        'um_extmdl_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_extmdl_code' => ['name' => 'Module Code', 'domain' => 'module_code_external'],
        'um_extmdl_type' => ['name' => 'Type', 'domain' => 'type_id', 'options_model' => '\Numbers\Backend\System\Modules\Model\Module\Types'],
        'um_extmdl_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_extmdl_abbreviation' => ['name' => 'Abbreviation', 'domain' => 'name'],
        'um_extmdl_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'um_extmdl_transactions' => ['name' => 'Transactions', 'type' => 'boolean'],
        'um_extmdl_multiple' => ['name' => 'Multiple', 'type' => 'boolean'],
        'um_extmdl_slug' => ['name' => 'Slug', 'domain' => 'slug', 'null' => true],
        'um_extmdl_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_external_modules_pk' => ['type' => 'pk', 'columns' => ['um_extmdl_tenant_id', 'um_extmdl_code']],
        'um_extmdl_slug_un' => ['type' => 'unique', 'columns' => ['um_extmdl_tenant_id', 'um_extmdl_slug']],
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = false;
    public $options_map = [
        'um_extmdl_name' => 'name',
        'um_extmdl_name*' => 'avatar_circle_small',
        'um_extmdl_inactive' => 'inactive'
    ];
    public $options_active = [
        'um_extmdl_inactive' => 0
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
     * Options short
     *
     * @param array $options
     * @return array
     */
    public function optionsAbbreviation($options = [])
    {
        $options['options_map'] = [
            'um_extmdl_abbreviation' => 'name',
            'um_extmdl_name' => 'title'
        ];
        return parent::options($options);
    }
}
