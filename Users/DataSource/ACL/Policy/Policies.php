<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\DataSource\ACL\Policy;

use Object\DataSource;
use Numbers\Backend\System\Policies\Model\Types;

class Policies extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['tenant_id', 'code'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $options_map = [
        'sm_policy_name' => 'name',
        //'sm_policy_code' => 'name',
        'sm_policy_tenant_id' => 'tenant_id',
        'sm_policy_inactive' => 'inactive',
    ];
    public $column_prefix;

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = true;

    public $primary_model = '\Numbers\Backend\System\Policies\Model\Policies';
    public $parameters = [];
    public $skip_tenant = true;

    public function query($parameters, $options = [])
    {
        $this->query->columns([
            'tenant_id' => 'a.sm_policy_tenant_id',
            'code' => 'a.sm_policy_code',
            'name' => 'a.sm_policy_name',
            'type' => 'a.sm_policy_sm_poltype_code',
            'model' => 'b.sm_poltype_model',
            'weight' => 'a.sm_policy_weight',
            'global' => 'a.sm_policy_global',
            'internal_json' => 'a.sm_policy_internal_json',
        ]);
        // join
        $this->query->join('INNER', new Types(), 'b', 'ON', [
            ['AND', ['a.sm_policy_sm_poltype_code', '=', 'b.sm_poltype_code', true], false]
        ]);
        // where
        $this->query->where('AND', ['a.sm_policy_tenant_id', 'IN', [1, \Tenant::id()]]);
        $this->query->where('AND', ['a.sm_policy_inactive', '=', 0]);
        $this->query->orderby(['sm_policy_weight' => SORT_DESC]);
    }

    public function process($data, $options = [])
    {
        foreach ($data as $k => $v) {
            foreach ($v as $k2 => $v2) {
                if (is_json($v2['internal_json'])) {
                    $data[$k][$k2]['internal_json'] = json_decode($v2['internal_json'], true);
                } else {
                    $data[$k][$k2]['internal_json'] = [];
                }
            }
        }
        return $data;
    }
}
