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
use Object\Table\Options;

class Controllers2 extends Controllers
{
    public $pk = ['id'];
    public $alias_model = true;

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
                        'name' => $v2['tm_module_name'],
                        'icon_class' => \HTML::icon(['type' => $sm[$v['module_code']]['sm_module_icon'], 'class_only' => true]),
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
                    '__selected_name' => i18n(null, $v2['tm_module_name']) . ': ' . i18n(null, $v['name']),
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
    public function determineClassificationIcon(string $classification): string
    {
        if ($classification == 'Settings') {
            return 'fas fa-cogs';
        }
        if ($classification == 'Account') {
            return 'far fa-user';
        }
        if ($classification == 'Reports') {
            return 'fas fa-table';
        }
        if ($classification == 'Tasks') {
            return 'far fa-sun';
        }
        if ($classification == 'Miscellaneous') {
            return 'fas fa-cubes';
        }
        return 'fas fa-cubes';
    }
}
