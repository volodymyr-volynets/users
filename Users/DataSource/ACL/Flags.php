<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\DataSource\ACL;

use Helper\Tree;
use Numbers\Tenants\Tenants\Model\Modules;
use Object\DataSource;
use Object\Table\Options;

class Flags extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['id'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $options_map = [];
    public $column_prefix;

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Backend\System\Modules\Model\System\Flags';
    public $primary_params = ['skip_acl' => true];
    public $parameters = [];

    public function query($parameters, $options = [])
    {
        $this->query->columns([
            'id' => 'a.sm_sysflag_id',
            'parent' => 'a.sm_sysflag_parent_sysflag_id',
            'code' => 'a.sm_sysflag_code',
            'name' => 'a.sm_sysflag_name',
            'icon' => 'a.sm_sysflag_icon',
            'module_code' => 'a.sm_sysflag_module_code',
            'disabled' => 'a.sm_sysflag_disabled',
            'inactive' => 'a.sm_sysflag_inactive',
        ]);
        // join
        $this->query->join('LEFT', new \Numbers\Backend\System\Modules\Model\Modules(), 'b', 'ON', [
            ['AND', ['a.sm_sysflag_module_code', '=', 'b.sm_module_code', true], false]
        ]);
        // where
        $this->query->where('AND', ['a.sm_sysflag_inactive', '=', 0]);
        // limit by activated modules
        $this->query->where('AND', function (& $query) {
            $query->where('OR', ['a.sm_sysflag_module_code', 'IN', ['SM', 'TM']]);
            $query->where('OR', function (& $query) {
                $query = Modules::queryBuilderStatic(['alias' => 'exists_a'])->select();
                $query->columns(['exists_a.tm_module_module_code']);
                $query->where('AND', ['exists_a.tm_module_module_code', '=', 'a.sm_sysflag_module_code', true]);
            }, 'EXISTS');
        });
    }

    /**
     * @see $this->options();
     */
    public function optionsJson(array $options = []): array
    {
        // load and process modules
        $temp = Modules::getStatic([
            'pk' => ['tm_module_id'],
            'where' => [
                'tm_module_inactive' => 0
            ]
        ]);
        $modules = [];
        foreach ($temp as $k => $v) {
            $modules[$v['tm_module_module_code']][$k] = $v;
        }
        $sm = \Numbers\Backend\System\Modules\Model\Modules::getStatic();
        // load controllers
        $data = $this->get($options);
        $result = [];
        foreach ($data as $k => $v) {
            if (empty($modules[$v['module_code']])) {
                continue;
            }
            foreach ($modules[$v['module_code']] as $k2 => $v2) {
                $key = Options::optionJsonFormatKey(['module_id' => $k2, 'sysflag_id' => $k]);
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
                        'name' => $v2['tm_module_name'],
                        'icon_class' => \HTML::icon(['type' => $sm[$v['module_code']]['sm_module_icon'], 'class_only' => true]),
                        'parent' => null,
                        'disabled' => true
                    ];
                }
                if (!empty($v['parent'])) {
                    $parent = Options::optionJsonFormatKey(['module_id' => $k2, 'sysflag_id' => $v['parent']]);
                }
                // add item
                $result[$key] = [
                    'name' => $v['name'],
                    'icon_class' => \HTML::icon(['type' => $v['icon'], 'class_only' => true]),
                    '__selected_name' => i18n(null, $v2['tm_module_name']) . ': ' . i18n(null, $v['name']),
                    'disabled' => $v['disabled'],
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
}
