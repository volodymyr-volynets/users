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
use Numbers\Users\Users\Model\Resource\WeightedModuleActions;

class WeightedModuleIDs extends DataSource
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
        'name' => 'name'
    ];
    public $column_prefix;

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Users\Users\Model\Resource\WeightedModuleIDs';
    public $parameters = [];

    public function query($parameters, $options = [])
    {
        $this->query->columns([
            'id' => 'a.um_weimdids_module_id',
            'name' => 'a.um_weimdids_name',
            'module_code' => 'a.um_weimdids_module_code',
            'module_multiple' => 'b.sm_module_multiple',
            'weight_value' => 'a.um_weimdids_weight_value',
            'action_weights' => 'c.action_weights'
        ]);
        // join
        $this->query->join('INNER', new Modules(), 'b', 'ON', [
            ['AND', ['a.um_weimdids_module_code', '=', 'b.sm_module_code', true], false],
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = WeightedModuleActions::queryBuilderStatic(['alias' => 'inner_c'])->select();
            $query->columns([
                'inner_c.um_weimdction_module_id',
                'action_weights' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_c.um_weimdction_action_id, inner_c.um_weimdction_weight_value)", 'delimiter' => ';;'])
            ]);
            // where
            $query->where('AND', ['inner_c.um_weimdction_weight_enabled', '=', 1]);
            $query->where('AND', ['inner_c.um_weimdction_inactive', '=', 0]);
            // group by
            $query->groupby(['inner_c.um_weimdction_module_id']);
        }, 'c', 'ON', [
            ['AND', ['a.um_weimdids_module_id', '=', 'c.um_weimdction_module_id', true], false]
        ]);
        // where
        $this->query->where('AND', ['a.um_weimdids_weight_enabled', '=', 1]);
        $this->query->where('AND', ['b.sm_module_inactive', '=', 0]);
    }

    public function process($data, $options = [])
    {
        foreach ($data as $k => $v) {
            if (!empty($v['action_weights'])) {
                $data[$k]['action_weights'] = [];
                $temp1 = explode(';;', $v['action_weights']);
                foreach ($temp1 as $v2) {
                    $v2 = explode('::', $v2);
                    $data[$k]['action_weights'][(int) $v2[0]] = [
                        'weight_value' => (int) $v2[1],
                    ];
                }
            } else {
                $data[$k]['action_weights'] = [];
            }
        }
        return $data;
    }
}
