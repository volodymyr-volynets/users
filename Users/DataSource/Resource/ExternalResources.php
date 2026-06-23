<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\DataSource\Resource;

use Object\DataSource;
use Helper\Tree;
use Object\Table\Options;
use Numbers\Users\Users\Model\Resource\ExternalModuleIDs;
use Numbers\Users\Users\Model\Resource\ExternalModules;

class ExternalResources extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['id'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $options_map = [
        'id' => 'id',
        'name' => 'name',
        'icon' => 'icon_class',
        'inactive' => 'inactive'
    ];
    public $options_active = [
        'inactive' => 0,
    ];
    public $column_prefix;

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Users\Users\Model\Resource\ExternalResources';
    public $primary_params = [];
    public $parameters = [
        'um_extresrc_acl_permission' => ['name' => 'Acl Permission', 'type' => 'boolean'],
        'um_extresrc_type' => ['name' => 'Type', 'domain' => 'type_id'],
    ];

    public function query($parameters, $options = [])
    {
        $this->query->columns([
            'id' => 'a.um_extresrc_id',
            'code' => 'a.um_extresrc_code',
            'name' => 'a.um_extresrc_name',
            'description' => 'a.um_extresrc_description',
            'classification' => 'a.um_extresrc_classification',
            'icon' => 'a.um_extresrc_icon',
            //'route_alias' => 'a.sm_resource_route_alias',
            'icon' => 'a.um_extresrc_icon',
            'module_code' => 'a.um_extresrc_um_extmdl_code',
            //'module_codes' => 'a.um_extresrc_extra_module_code',
            //'breadcrumbs' => "concat_ws('::', b.sm_module_name, a.sm_resource_group1_name, a.sm_resource_group2_name, sm_resource_group3_name, sm_resource_group4_name, sm_resource_group5_name, sm_resource_group6_name, sm_resource_group7_name, sm_resource_group8_name, sm_resource_group9_name)",
            //'actions' => 'c.actions',
            'acl_public' => 'a.um_extresrc_acl_public',
            'acl_authorized' => 'a.um_extresrc_acl_authorized',
            'acl_permission' => 'a.um_extresrc_acl_permission',
            //'missing_features' => 'COALESCE(d.missing_features, 0)',
            //'template' => 'a.sm_resource_template_name',
            //'api_methods' => 'f.api_methods',
        ]);
        // where
        if (empty($parameters['um_extresrc_type'])) {
            $parameters['um_extresrc_type'] = [100, 150];
        }
        $this->query->where('AND', ['a.um_extresrc_inactive', '=', 0]);
        if (!empty($parameters)) {
            foreach ($parameters as $k => $v) {
                $this->query->where('AND', ["a.{$k}", '=', $v]);
            }
        }
    }

    /**
     * @see $this->options();
     */
    public function optionsJson(array $options = []): array
    {
        // load and process modules
        $temp = ExternalModuleIDs::getStatic([
            'pk' => ['um_extmdids_id'],
            'where' => [
                'um_extmdids_tenant_id' => \Tenant::id(),
                'um_extmdids_inactive' => 0
            ]
        ]);
        $modules = [];
        foreach ($temp as $k => $v) {
            $modules[$v['um_extmdids_um_extmdl_code']][$k] = $v;
        }
        $sm = ExternalModules::getStatic([
            'where' => [
                'um_extmdl_tenant_id' => \Tenant::id(),
            ],
            'pk' => ['um_extmdl_code']
        ]);
        // load controllers
        $data = $this->get($options);
        $result = [];
        foreach ($data as $k => $v) {
            if (empty($modules[$v['module_code']])) {
                continue;
            }
            foreach ($modules[$v['module_code']] as $k2 => $v2) {
                $key = Options::optionJsonFormatKey(['module_id' => $k2, 'resource_id' => $k]);
                // handle exceptions
                if (!empty($options['where']['acl_handle_exceptions']) && !\User::get('super_admin') && !\User::get('handle_exceptions')) {
                    if (!is_array($options['existing_values'])) {
                        $options['existing_values'] = [$options['existing_values']];
                    }
                    if (!in_array($key, $options['existing_values'])) {
                        continue;
                    }
                }
                $parent = Options::optionJsonFormatKey(['module_id' => $k2]);
                // add parent
                if (!isset($result[$parent])) {
                    $result[$parent] = [
                        'name' => $v2['um_extmdids_name'],
                        'icon_class' => \HTML::icon(['type' => $sm[$v['module_code']]['um_extmdl_icon'], 'class_only' => true]),
                        'parent' => null,
                        'disabled' => true
                    ];
                }
                // add classification, ignore global
                if (!in_array($v['classification'], ['Global', 'Transactions'])) {
                    $parent2 = Options::optionJsonFormatKey(['module_id' => $k2, 'classification' => $v['classification']]);
                    if (!isset($result[$parent2])) {
                        $result[$parent2] = [
                            'name' => $v['classification'],
                            'icon_class' => \HTML::icon(['type' => $this->determineClassificationIcon($v['classification']), 'class_only' => true]),
                            'parent' => $parent,
                            'disabled' => true
                        ];
                    }
                    $parent = $parent2;
                }
                // add item
                $result[$key] = [
                    'name' => $v['name'],
                    'icon_class' => \HTML::icon(['type' => $v['icon'], 'class_only' => true]),
                    '__selected_name' => i18n(null, $v2['um_extmdids_name']) . ': ' . i18n(null, $v['name']),
                    'parent' => $parent
                ];
            }
        }
        if (!empty($result)) {
            $converted = Tree::convertByParent($result, 'parent');
            $result = [];
            Tree::convertTreeToOptionsMulti($converted, 0, ['name_field' => 'name'], $result);
        }
        return $result;
    }

    /**
     * Determine classification icon
     *
     * @param string $classification
     * @return string
     */
    public function determineClassificationIcon(?string $classification): string
    {
        if ($classification == 'Settings') {
            return 'fa-solid fa-cogs';
        }
        if ($classification == 'Account') {
            return 'fa-regular fa-user';
        }
        if ($classification == 'Reports') {
            return 'fa-solid fa-table';
        }
        if ($classification == 'Tasks') {
            return 'fa-regular fa-sun';
        }
        if ($classification == 'Miscellaneous') {
            return 'fa-solid fa-cubes';
        }
        if ($classification == 'Tools') {
            return 'fa-solid fa-toolbox';
        }
        return 'fa-solid fa-cubes';
    }
}
