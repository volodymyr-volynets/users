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

class ExternalResources extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'UM';
    public $title = 'U/M External Resources';
    public $name = 'um_external_resources';
    public $pk = ['um_extresrc_tenant_id', 'um_extresrc_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'um_extresrc_';
    public $columns = [
        'um_extresrc_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'um_extresrc_id' => ['name' => 'Resource #', 'domain' => 'resource_id_sequence'],
        'um_extresrc_code' => ['name' => 'Code', 'domain' => 'code'],
        'um_extresrc_type' => ['name' => 'Type', 'domain' => 'type_id', 'options_model' => '\Numbers\Backend\System\Modules\Model\Resource\Types'],
        'um_extresrc_classification' => ['name' => 'Classification', 'domain' => 'name', 'null' => true],
        'um_extresrc_name' => ['name' => 'Name', 'domain' => 'name'],
        'um_extresrc_description' => ['name' => 'Description', 'domain' => 'description', 'null' => true],
        'um_extresrc_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'um_extresrc_um_extmdl_code' => ['name' => 'Module Code', 'domain' => 'module_code_external'],
        'um_extresrc_groups' => ['name' => 'Groups', 'domain' => 'description', 'null' => true],
        'um_extresrc_slug' => ['name' => 'Slug', 'domain' => 'slug', 'null' => true],
        // acl
        'um_extresrc_acl_public' => ['name' => 'Acl Public', 'type' => 'boolean'],
        'um_extresrc_acl_authorized' => ['name' => 'Acl Authorized', 'type' => 'boolean'],
        'um_extresrc_acl_permission' => ['name' => 'Acl Permission', 'type' => 'boolean'],
        // weight
        'um_extresrc_weight_enabled' => ['name' => 'Weight Enabled', 'type' => 'boolean'],
        'um_extresrc_weight_value' => ['name' => 'Weight Value', 'domain' => 'weight', 'null' => true],
        // menu
        'um_extresrc_menu_url' => ['name' => 'Menu URL', 'type' => 'text', 'null' => true],
        // other
        'um_extresrc_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'um_external_resources_pk' => ['type' => 'pk', 'columns' => ['um_extresrc_tenant_id', 'um_extresrc_id']],
        'um_extresrc_code_un' => ['type' => 'unique', 'columns' => ['um_extresrc_tenant_id', 'um_extresrc_code']],
        'um_extresrc_slug_um' => ['type' => 'unique', 'columns' => ['um_extresrc_tenant_id', 'um_extresrc_slug']],
        'um_extresrc_um_extmdl_code_fk' => [
            'type' => 'fk',
            'columns' => ['um_extresrc_tenant_id', 'um_extresrc_um_extmdl_code'],
            'foreign_model' => '\Numbers\Users\Users\Model\Resource\ExternalModules',
            'foreign_columns' => ['um_extmdl_tenant_id', 'um_extmdl_code']
        ]
    ];
    public $history = false;
    public $audit = false;
    public $optimistic_lock = false;
    public $options_map = [
        'um_extresrc_name' => 'name',
        'um_extresrc_name*' => 'avatar_circle_small',
        // todo icon vs avatar
        //'um_extresrc_icon' => 'icon_class',
        'um_extresrc_inactive' => 'inactive',
    ];
    public $options_active = [
        'um_extresrc_inactive' => 0,
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'public',
        'protection' => 1,
        'scope' => 'global'
    ];

    /**
     * @see $this->options()
     */
    public function optionsColumnSettings($options)
    {
        $query = $this->queryBuilder(['alias' => 'a'])
            ->select()
            ->columns([
                'name' => $options['where']['__column']
            ])
            ->distinct()
            ->where('AND', [$options['where']['__column'], 'IS NOT', null])
            ->where('AND', ['um_extresrc_type', '=', $options['where']['um_extresrc_type']])
            ->orderby(['name' => SORT_ASC]);
        return $query->query('name')['rows'];
    }
}
