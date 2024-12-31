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

use Object\DataSource;
use Numbers\Users\Users\Model\Setting\Policy\Groups;
use Numbers\Users\Users\Model\Setting\Policy\Policies;

class Settings extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['module_id'];
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

    public $primary_model = '\Numbers\Users\Users\Model\Settings';
    public $primary_params = ['skip_acl' => true];
    public $parameters = [];

    public function query($parameters, $options = [])
    {
        $this->query->columns([
            'tenant_id' => 'a.um_setting_tenant_id',
            'module_id' => 'a.um_setting_module_id',
            'inactive' => 'a.um_setting_inactive',
            'o.policies',
            'p.policy_groups',
        ]);
        // policies
        $this->query->join('LEFT', function (& $query) {
            $query = Policies::queryBuilderStatic(['alias' => 'inner_o', 'skip_acl' => true])->select();
            $query->columns([
                'inner_o.um_setpolicy_module_id',
                'policies' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('-::-', inner_o.um_setpolicy_sm_policy_tenant_id, inner_o.um_setpolicy_sm_policy_code, inner_o.um_setpolicy_inactive)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['inner_o.um_setpolicy_module_id']);
        }, 'o', 'ON', [
            ['AND', ['a.um_setting_module_id', '=', 'o.um_setpolicy_module_id', true], false]
        ]);
        // policy groups
        $this->query->join('LEFT', function (& $query) {
            $query = Groups::queryBuilderStatic(['alias' => 'inner_p', 'skip_acl' => true])->select();
            $query->columns([
                'inner_p.um_setpolgrp_module_id',
                'policy_groups' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_p.um_setpolgrp_sm_polgroup_tenant_id, inner_p.um_setpolgrp_sm_polgroup_id, inner_p.um_setpolgrp_inactive)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['inner_p.um_setpolgrp_module_id']);
        }, 'p', 'ON', [
            ['AND', ['a.um_setting_module_id', '=', 'p.um_setpolgrp_module_id', true], false]
        ]);
        // where
        $this->query->where('AND', ['a.um_setting_inactive', '=', 0]);
    }

    public function process($data, $options = [])
    {
        foreach ($data as $k => $v) {
            // policies
            if (!empty($v['policies'])) {
                $data[$k]['policies'] = [];
                $temp = explode(';;', $v['policies']);
                foreach ($temp as $v2) {
                    $v2 = explode('-::-', $v2);
                    $data[$k]['policies'][(int) $v2[0]][$v2[1]] = (int) $v2[2];
                }
            } else {
                $data[$k]['policies'] = [];
            }
            // policy groups
            if (!empty($v['policy_groups'])) {
                $data[$k]['policy_groups'] = [];
                $temp = explode(';;', $v['policy_groups']);
                foreach ($temp as $v2) {
                    $v2 = explode('::', $v2);
                    $data[$k]['policy_groups'][(int) $v2[0]][(int) $v2[1]] = (int) $v2[2];
                }
            } else {
                $data[$k]['policy_groups'] = [];
            }
        }
        return $data;
    }
}
