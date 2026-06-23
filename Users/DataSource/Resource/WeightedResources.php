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
use Numbers\Backend\System\Modules\Model\Modules;
use Numbers\Users\Users\Model\Resource\WeightedResourceActions;

class WeightedResources extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['module_id', 'resource_id'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $options_map = [
        'name' => 'name'
    ];
    public $column_prefix;

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Users\Users\Model\Resource\WeightedResources';
    public $parameters = [];

    public function query($parameters, $options = [])
    {
        $this->query->columns([
            'module_id' => 'a.um_weiresrc_module_id',
            'resource_id' => 'a.um_weiresrc_resource_id',
            'name' => 'a.um_weiresrc_name',
            'module_code' => 'a.um_weiresrc_module_code',
            'module_multiple' => 'b.sm_module_multiple',
            'weight_value' => 'a.um_weiresrc_weight_value',
            'action_weights' => 'c.action_weights'
        ]);
        // join
        $this->query->join('INNER', new Modules(), 'b', 'ON', [
            ['AND', ['a.um_weiresrc_module_code', '=', 'b.sm_module_code', true], false],
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = WeightedResourceActions::queryBuilderStatic(['alias' => 'inner_c'])->select();
            $query->columns([
                'inner_c.um_weiresactn_module_id',
                'inner_c.um_weiresactn_resource_id',
                'action_weights' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_c.um_weiresactn_action_id, inner_c.um_weiresactn_weight_value)", 'delimiter' => ';;'])
            ]);
            // where
            $query->where('AND', ['inner_c.um_weiresactn_weight_enabled', '=', 1]);
            $query->where('AND', ['inner_c.um_weiresactn_inactive', '=', 0]);
            // group by
            $query->groupby(['inner_c.um_weiresactn_module_id', 'inner_c.um_weiresactn_resource_id']);
        }, 'c', 'ON', [
            ['AND', ['a.um_weiresrc_module_id', '=', 'c.um_weiresactn_module_id', true], false],
            ['AND', ['a.um_weiresrc_resource_id', '=', 'c.um_weiresactn_resource_id', true], false],
        ]);
        // where
        $this->query->where('AND', ['a.um_weiresrc_weight_enabled', '=', 1]);
        $this->query->where('AND', ['b.sm_module_inactive', '=', 0]);
    }

    public function process($data, $options = [])
    {
        foreach ($data as $k => $v) {
            foreach ($v as $k2 => $v2) {
                if (!empty($v2['action_weights'])) {
                    $data[$k][$k2]['action_weights'] = [];
                    $temp1 = explode(';;', $v2['action_weights']);
                    foreach ($temp1 as $v3) {
                        $v3 = explode('::', $v3);
                        $data[$k][$k2]['action_weights'][(int) $v3[0]] = [
                            'weight_value' => (int) $v3[1],
                        ];
                    }
                } else {
                    $data[$k][$k2]['action_weights'] = [];
                }
            }
        }
        return $data;
    }
}
