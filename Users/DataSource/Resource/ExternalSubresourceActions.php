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
use Numbers\Users\Users\Model\Resource\ExternalActions;

class ExternalSubresourceActions extends DataSource
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

    public $primary_model = '\Numbers\Users\Users\Model\Resource\ExternalSubresourceMap';
    public $parameters = [
        'um_extsursrc_id' => ['name' => 'Subresource #', 'domain' => 'resource_id', 'required' => true],
    ];

    public function query($parameters, $options = [])
    {
        // columns
        $this->query->columns([
            'id' => 'a.um_extsursmap_um_extactn_id',
            'parent_id' => 'b.um_extactn_parent_um_extactn_id',
            'name' => 'b.um_extactn_name',
            'icon' => 'b.um_extactn_icon',
            'disabled' => 'a.um_extsursmap_disabled',
            'inactive' => 'a.um_extsursmap_inactive + b.um_extactn_inactive'
        ]);
        // join
        $this->query->join('INNER', new ExternalActions(), 'b', 'ON', [
            ['AND', ['a.um_extsursmap_um_extactn_id', '=', 'b.um_extactn_id', true], false],
        ]);
        // where
        $this->query->where('AND', ['a.um_extsursmap_um_extsursrc_id', '=', $parameters['um_extsursrc_id']]);
    }

    /**
     * @see $this->options();
     */
    public function optionsGrouped($options = [])
    {
        if (!is_array($options['existing_values'])) {
            $options['existing_values'] = [$options['existing_values']];
        }
        $data = $this->get($options);
        $result = [];
        foreach ($data as $k => $v) {
            // hide inactive
            if ($v['inactive'] && !in_array($k, $options['existing_values'])) {
                continue;
            }
            // add item
            $result[$k] = [
                'name' => $v['name'],
                'icon_class' => \HTML::icon(['type' => $v['icon'] ?? 'fa-solid fa-cubes', 'class_only' => true]),
                'parent' => $v['parent_id'],
                'disabled' => $v['disabled'],
                'inactive' => $v['inactive'],
            ];
        }
        if (!empty($result)) {
            $converted = Tree::convertByParent($result, 'parent');
            $result = [];
            Tree::convertTreeToOptionsMulti($converted, 0, ['name_field' => 'name'], $result);
        }
        return $result;
    }
}
