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

use Helper\Tree;
use Object\DataSource;
use Object\Table\Options;
use Numbers\Users\Users\Model\Resource\ExternalActions;

class ExternalResourceMap extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['um_extresmap_um_extresrc_id', 'um_extresmap_method_code', 'um_extresmap_um_extactn_id'];
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

    public $primary_model = '\Numbers\Users\Users\Model\Resource\ExternalResourceMap';
    public $parameters = [
        'um_extresmap_um_extresrc_id' => ['name' => 'Resource #', 'domain' => 'resource_id', 'required' => true],
        'existing_values' => ['name' => 'Existing Values', 'type' => 'mixed'],
    ];

    public function query($parameters, $options = [])
    {
        // columns
        $this->query->columns([
            'um_extresmap_um_extresrc_id' => 'a.um_extresmap_um_extresrc_id',
            'um_extresmap_um_extactn_id' => 'a.um_extresmap_um_extactn_id',
            'um_extactn_order' => 'b.um_extactn_order',
            'um_extactn_parent_um_extactn_id' => 'b.um_extactn_parent_um_extactn_id',
            'um_extactn_name' => 'b.um_extactn_name',
            'um_extactn_icon' => 'b.um_extactn_icon',
            'um_extresmap_method_code' => 'a.um_extresmap_method_code',
            'disabled' => 'a.um_extresmap_disabled',
            'inactive' => 'a.um_extresmap_inactive + b.um_extactn_inactive'
        ]);
        // joins
        $this->query->join('INNER', new ExternalActions(), 'b', 'ON', [
            ['AND', ['a.um_extresmap_um_extactn_id', '=', 'b.um_extactn_id', true], false]
        ]);
        // where
        $this->query->where('AND', ['a.um_extresmap_um_extresrc_id', '=', $parameters['um_extresmap_um_extresrc_id']]);
        $this->query->where('AND', function (& $query) use ($parameters) {
            $query->where('OR', ['a.um_extresmap_inactive + b.um_extactn_inactive', '=', 0, true], false);
            if (!empty($parameters['existing_values'])) {
                $query->where('OR', ["concat_ws('::', a.um_extresmap_method_code, a.um_extresmap_um_extactn_id)", '=', Options::optionJsonExtractKey($parameters['existing_values'], ['method_code', 'action_id'], '::')]);
            }
        });
        // order by
        $this->query->orderby(['um_extactn_order' => SORT_ASC, 'um_extresmap_um_extactn_id' => SORT_ASC]);
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
                foreach ($v2 as $k3 => $v3) {
                    if ($k3 == -1) {
                        $key = Options::optionJsonFormatKey(['action_id' => $k3, 'method_code' => $k2]);
                        $result[$key] = [
                            'name' => $v3['um_extactn_name'],
                            'icon_class' => \HTML::icon(['type' => $v3['um_extactn_icon'], 'class_only' => true]),
                            //'__selected_name' => i18n(null, $v3['um_extresmap_method_code']) . ': ' . i18n(null, $v3['um_extactn_name']),
                            'parent' => null,
                            'disabled' => $v3['disabled'],
                            'inactive' => $v3['inactive']
                        ];
                    } else {
                        $parent = Options::optionJsonFormatKey(['method_code' => $k2]);
                        // add method
                        if (!isset($result[$parent])) {
                            $result[$parent] = ['name' => $v3['um_extresmap_method_code'], 'parent' => null, 'disabled' => true];
                        }
                        // add item
                        $key = Options::optionJsonFormatKey(['action_id' => $k3, 'method_code' => $k2]);
                        // if we have a parent
                        if (!empty($v3['um_extactn_parent_um_extactn_id'])) {
                            $parent = Options::optionJsonFormatKey(['action_id' => $v3['um_extactn_parent_um_extactn_id'], 'method_code' => $k2]);
                        }
                        $result[$key] = [
                            'name' => $v3['um_extactn_name'],
                            'icon_class' => \HTML::icon(['type' => $v3['um_extactn_icon'], 'class_only' => true]),
                            '__selected_name' => i18n(null, $v3['um_extresmap_method_code']) . ': ' . i18n(null, $v3['um_extactn_name']),
                            'parent' => $parent,
                            'disabled' => $v3['disabled'],
                            'inactive' => $v3['inactive']
                        ];
                    }
                }
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
