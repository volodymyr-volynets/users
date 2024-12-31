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
use Numbers\Backend\System\Policies\Model\Group\Policies;

class Groups extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['tenant_id', 'id'];
    public $skip_tenant = true;
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $options_map = [];
    public $column_prefix;

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = true;

    public $primary_model = '\Numbers\Backend\System\Policies\Model\Groups';
    public $primary_params = ['skip_acl' => true];
    public $parameters = [];

    public function query($parameters, $options = [])
    {
        $this->query->columns([
            'tenant_id' => 'a.sm_polgroup_tenant_id',
            'id' => 'sm_polgroup_id',
            'code' => 'sm_polgroup_code',
            'name' => 'sm_polgroup_name',
            'global' => 'sm_polgroup_global',
            'weight' => 'sm_polgroup_weight',
            'c.policies',
            'b.policy_groups',
        ]);
        // join
        $this->query->join('LEFT', function (& $query) {
            $query = \Numbers\Backend\System\Policies\Model\Group\Groups::queryBuilderStatic(['alias' => 'inner_a', 'skip_acl' => true])->select();
            $query->columns([
                'inner_a.sm_polgrogroup_tenant_id',
                'inner_a.sm_polgrogroup_sm_polgroup_id',
                'policy_groups' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_a.sm_polgrogroup_child_sm_polgroup_tenant_id, inner_a.sm_polgrogroup_child_sm_polgroup_id, inner_a.sm_polgrogroup_inactive)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['inner_a.sm_polgrogroup_tenant_id', 'inner_a.sm_polgrogroup_sm_polgroup_id']);
            $query->where('AND', ['inner_a.sm_polgrogroup_inactive', '=', 0]);
        }, 'b', 'ON', [
            ['AND', ['a.sm_polgroup_tenant_id', '=', 'b.sm_polgrogroup_tenant_id', true], false],
            ['AND', ['a.sm_polgroup_id', '=', 'b.sm_polgrogroup_sm_polgroup_id', true], false],
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = Policies::queryBuilderStatic(['alias' => 'inner_b', 'skip_acl' => true])->select();
            $query->columns([
                'inner_b.sm_polgropolicy_tenant_id',
                'inner_b.sm_polgropolicy_sm_polgroup_id',
                'policies' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('-::-', inner_b.sm_polgropolicy_sm_policy_tenant_id, inner_b.sm_polgropolicy_sm_policy_code, inner_b.sm_polgropolicy_inactive)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['inner_b.sm_polgropolicy_tenant_id', 'inner_b.sm_polgropolicy_sm_polgroup_id']);
            $query->where('AND', ['inner_b.sm_polgropolicy_inactive', '=', 0]);
        }, 'c', 'ON', [
            ['AND', ['a.sm_polgroup_tenant_id', '=', 'c.sm_polgropolicy_tenant_id', true], false],
            ['AND', ['a.sm_polgroup_id', '=', 'c.sm_polgropolicy_sm_polgroup_id', true], false],
        ]);
        // where
        $this->query->where('AND', ['a.sm_polgroup_tenant_id', 'IN', [1, \Tenant::id()]]);
        $this->query->where('AND', ['a.sm_polgroup_inactive', '=', 0]);
    }

    public function process($data, $options = [])
    {
        foreach ($data as $k => $v) {
            foreach ($v as $k2 => $v2) {
                // policy groups
                $data[$k][$k2]['policy_groups'] = [];
                if (!empty($v2['policy_groups'])) {
                    $temp = explode(';;', $v2['policy_groups']);
                    foreach ($temp as $v3) {
                        $v3 = explode('::', $v3);
                        $data[$k][$k2]['policy_groups'][(int) $v3[0]][(int)$v3[1]] = (int) $v3[2];
                    }
                }
                // policies
                $data[$k][$k2]['policies'] = [];
                if (!empty($v2['policies'])) {
                    $temp = explode(';;', $v2['policies']);
                    foreach ($temp as $v3) {
                        $v3 = explode('-::-', $v3);
                        $data[$k][$k2]['policies'][(int) $v3[0]][$v3[1]] = (int) $v3[2];
                    }
                }
            }
        }
        return $data;
    }
}
