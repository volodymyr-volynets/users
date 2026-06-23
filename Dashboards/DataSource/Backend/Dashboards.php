<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Dashboards\DataSource\Backend;

use Helper\Tree;
use Object\DataSource;
use Object\Table\Options;

class Dashboards extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['d9_backdash_code'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $options_map = [
        'd9_backdash_name' => 'name',
        'd9_backdash_code' => 'name',
        'd9_backdash_size_description' => [
            'field' => 'name',
            'prefix' => 'Size: ',
        ],
        'd9_backdash_tenant_id' => 'tenant_id',
        'd9_backdash_inactive' => 'inactive',
    ];
    public $options_active = [
        'd9_backdash_inactive' => 0
    ];
    public $column_prefix;

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Users\Dashboards\Model\Backend\Dashboards';
    public $parameters = [
        'd9_backdash_code' => ['name' => 'Dashboard Code', 'domain' => 'group_code'],
    ];
    public $skip_tenant = true;

    public function query($parameters, $options = [])
    {
        $this->query->columns('*');
        $this->query->where('AND', ['a.d9_backdash_tenant_id', 'IN', [1, \Tenant::id()]]);
        if (!empty($parameters['d9_backdash_code'])) {
            $this->query->where('AND', condition: ['a.d9_backdash_code', '=', $parameters['d9_backdash_code']]);
        }
    }

    /**
     * @see $this->options()
     */
    public function optionsJson($options = [])
    {
        $data = $this->get($options);
        $result = [];
        foreach ($data as $k => $v) {
            foreach ($v as $k2 => $v2) {
                $parent = Options::optionJsonFormatKey(['d9_backdash_tenant_id' => $k]);
                // item key
                $key = Options::optionJsonFormatKey(['d9_backdash_code' => $k2, 'd9_backdash_tenant_id' => $k]);
                // filter
                if (!Options::processOptionsExistingValuesAndSkipValues($key, $options['existing_values'] ?? null, $options['skip_values'] ?? null)) {
                    continue;
                }
                // add parent
                if (!isset($result[$parent])) {
                    $result[$parent] = ['name' => ($k == 1 ? 'Global Dashboards' : 'Local Dashboards'), 'parent' => null, 'disabled' => true];
                }
                // add item
                $result[$key] = ['name' => $v2['d9_backdash_name'], '__selected_name' => ($k == 1 ? 'Global Dashboards' : 'Local Dashboards') . ' - ' . $v2['d9_backdash_name'], 'parent' => $parent];
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
