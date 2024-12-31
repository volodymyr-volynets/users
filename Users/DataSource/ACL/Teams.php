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

use Numbers\Users\Users\Model\Team\API\Methods;
use Numbers\Users\Users\Model\Team\APIs;
use Numbers\Users\Users\Model\Team\Features;
use Numbers\Users\Users\Model\Team\Flags;
use Numbers\Users\Users\Model\Team\Notifications;
use Numbers\Users\Users\Model\Team\Permission\Actions;
use Numbers\Users\Users\Model\Team\Permission\Subresources;
use Numbers\Users\Users\Model\Team\Permissions;
use Object\DataSource;
use Numbers\Users\Users\Model\Team\Policy\Groups;
use Numbers\Users\Users\Model\Team\Policy\Policies;

class Teams extends DataSource
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
    public $cache_memory = true;

    public $primary_model = '\Numbers\Users\Users\Model\Teams';
    public $parameters = [];

    public function query($parameters, $options = [])
    {
        $this->query->columns([
            'id' => 'a.um_team_id',
            'name' => 'a.um_team_name',
            'weight' => 'a.um_team_weight',
            'inactive' => 'a.um_team_inactive',
            'c.permissions',
            'j.features',
            'm.notifications',
            'k.subresources',
            'l.flags',
            'n.apis',
            'o.policies',
            'p.policy_groups',
        ]);
        // join
        $this->query->join('LEFT', function (& $query) {
            $query = Actions::queryBuilderStatic(['alias' => 'inner_a', 'skip_acl' => true])->select();
            $query->columns([
                'inner_a.um_temperaction_team_id',
                'permissions' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_a.um_temperaction_resource_id, inner_a.um_temperaction_method_code, inner_a.um_temperaction_action_id, (inner_a.um_temperaction_inactive + inner_b.um_temperm_inactive), inner_a.um_temperaction_module_id)", 'delimiter' => ';;'])
            ]);
            $query->join('INNER', new Permissions(), 'inner_b', 'ON', [
                ['AND', ['inner_a.um_temperaction_team_id', '=', 'inner_b.um_temperm_team_id', true], false],
                ['AND', ['inner_a.um_temperaction_module_id', '=', 'inner_b.um_temperm_module_id', true], false],
                ['AND', ['inner_a.um_temperaction_resource_id', '=', 'inner_b.um_temperm_resource_id', true], false]
            ]);
            $query->groupby(['inner_a.um_temperaction_team_id']);
        }, 'c', 'ON', [
            ['AND', ['a.um_team_id', '=', 'c.um_temperaction_team_id', true], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = Features::queryBuilderStatic(['alias' => 'inner_j', 'skip_acl' => true])->select();
            $query->columns([
                'inner_j.um_temfeature_team_id',
                'features' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('~~', inner_j.um_temfeature_feature_code, inner_j.um_temfeature_module_id, inner_j.um_temfeature_inactive)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['inner_j.um_temfeature_team_id']);
        }, 'j', 'ON', [
            ['AND', ['a.um_team_id', '=', 'j.um_temfeature_team_id', true], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = Subresources::queryBuilderStatic(['alias' => 'inner_k', 'skip_acl' => true])->select();
            // join
            $query->join('INNER', new Permissions(), 'inner_k2', 'ON', [
                ['AND', ['inner_k.um_temsubres_team_id', '=', 'inner_k2.um_temperm_team_id', true], false],
                ['AND', ['inner_k.um_temsubres_module_id', '=', 'inner_k2.um_temperm_module_id', true], false],
                ['AND', ['inner_k.um_temsubres_resource_id', '=', 'inner_k2.um_temperm_resource_id', true], false]
            ]);
            $query->columns([
                'inner_k.um_temsubres_team_id',
                'subresources' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_k.um_temsubres_resource_id, inner_k.um_temsubres_rsrsubres_id, inner_k.um_temsubres_action_id, (inner_k.um_temsubres_inactive + inner_k2.um_temperm_inactive), inner_k.um_temsubres_module_id)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['inner_k.um_temsubres_team_id']);
        }, 'k', 'ON', [
            ['AND', ['a.um_team_id', '=', 'k.um_temsubres_team_id', true], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = Flags::queryBuilderStatic(['alias' => 'inner_l', 'skip_acl' => true])->select();
            $query->columns([
                'inner_l.um_temsysflag_team_id',
                'flags' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_l.um_temsysflag_sysflag_id, inner_l.um_temsysflag_action_id, inner_l.um_temsysflag_inactive, inner_l.um_temsysflag_module_id)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['inner_l.um_temsysflag_team_id']);
        }, 'l', 'ON', [
            ['AND', ['a.um_team_id', '=', 'l.um_temsysflag_team_id', true], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = Notifications::queryBuilderStatic(['alias' => 'inner_m', 'skip_acl' => true])->select();
            $query->columns([
                'inner_m.um_temnoti_team_id',
                'notifications' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('~~', inner_m.um_temnoti_feature_code, inner_m.um_temnoti_module_id, inner_m.um_temnoti_inactive)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['inner_m.um_temnoti_team_id']);
        }, 'm', 'ON', [
            ['AND', ['a.um_team_id', '=', 'm.um_temnoti_team_id', true], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = Methods::queryBuilderStatic(['alias' => 'inner_n', 'skip_acl' => true])->select();
            $query->columns([
                'inner_n.um_temapmethod_team_id',
                'apis' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_n.um_temapmethod_resource_id, inner_n.um_temapmethod_method_code, (inner_n.um_temapmethod_inactive + inner_n2.um_temapi_inactive), inner_n.um_temapmethod_module_id)", 'delimiter' => ';;'])
            ]);
            $query->join('INNER', new APIs(), 'inner_n2', 'ON', [
                ['AND', ['inner_n.um_temapmethod_team_id', '=', 'inner_n2.um_temapi_team_id', true], false],
                ['AND', ['inner_n.um_temapmethod_module_id', '=', 'inner_n2.um_temapi_module_id', true], false],
                ['AND', ['inner_n.um_temapmethod_resource_id', '=', 'inner_n2.um_temapi_resource_id', true], false]
            ]);
            $query->groupby(['inner_n.um_temapmethod_team_id']);
        }, 'n', 'ON', [
            ['AND', ['a.um_team_id', '=', 'n.um_temapmethod_team_id', true], false]
        ]);
        // policies
        $this->query->join('LEFT', function (& $query) {
            $query = Policies::queryBuilderStatic(['alias' => 'inner_o', 'skip_acl' => true])->select();
            $query->columns([
                'inner_o.um_tempolicy_team_id',
                'policies' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('-::-', inner_o.um_tempolicy_sm_policy_tenant_id, inner_o.um_tempolicy_sm_policy_code, inner_o.um_tempolicy_inactive)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['inner_o.um_tempolicy_team_id']);
        }, 'o', 'ON', [
            ['AND', ['a.um_team_id', '=', 'o.um_tempolicy_team_id', true], false]
        ]);
        // policy groups
        $this->query->join('LEFT', function (& $query) {
            $query = Groups::queryBuilderStatic(['alias' => 'inner_p', 'skip_acl' => true])->select();
            $query->columns(columns: [
                'inner_p.um_tempolgrp_team_id',
                'policy_groups' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_p.um_tempolgrp_sm_polgroup_tenant_id, inner_p.um_tempolgrp_sm_polgroup_id, inner_p.um_tempolgrp_inactive)", 'delimiter' => ';;'])
            ]);
            $query->groupby(['inner_p.um_tempolgrp_team_id']);
        }, 'p', 'ON', [
            ['AND', ['a.um_team_id', '=', 'p.um_tempolgrp_team_id', true], false]
        ]);
        // where
        $this->query->where('AND', ['a.um_team_inactive', '=', 0]);
    }

    public function process($data, $options = [])
    {
        foreach ($data as $k => $v) {
            // permissions
            if (!empty($v['permissions'])) {
                $data[$k]['permissions'] = [];
                $temp = explode(';;', $v['permissions']);
                foreach ($temp as $v2) {
                    $v2 = explode('::', $v2);
                    $data[$k]['permissions'][(int) $v2[0]][$v2[1]][(int )$v2[2]][(int) $v2[4]] = (int) $v2[3];
                }
            } else {
                $data[$k]['permissions'] = [];
            }
            // apis
            if (!empty($v['apis'])) {
                $data[$k]['apis'] = [];
                $temp = explode(';;', $v['apis']);
                foreach ($temp as $v2) {
                    $v2 = explode('::', $v2);
                    $data[$k]['apis'][(int) $v2[0]][$v2[1]][(int) $v2[3]] = (int) $v2[2];
                }
            } else {
                $data[$k]['apis'] = [];
            }
            // features
            if (!empty($v['features'])) {
                $data[$k]['features'] = [];
                $temp = explode(';;', $v['features']);
                foreach ($temp as $v2) {
                    $v2 = explode('~~', $v2);
                    $data[$k]['features'][$v2[0]][(int) $v2[1]] = (int) $v2[2];
                }
            } else {
                $data[$k]['features'] = [];
            }
            // notifications
            if (!empty($v['notifications'])) {
                $data[$k]['notifications'] = [];
                $temp = explode(';;', $v['notifications']);
                foreach ($temp as $v2) {
                    $v2 = explode('~~', $v2);
                    $data[$k]['notifications'][$v2[0]][(int) $v2[1]] = (int) $v2[2];
                }
            } else {
                $data[$k]['notifications'] = [];
            }
            // subresources
            if (!empty($v['subresources'])) {
                $data[$k]['subresources'] = [];
                $temp = explode(';;', $v['subresources']);
                foreach ($temp as $v2) {
                    $v2 = explode('::', $v2);
                    $data[$k]['subresources'][(int) $v2[0]][(int) $v2[1]][(int )$v2[2]][(int) $v2[4]] = (int) $v2[3];
                }
            } else {
                $data[$k]['subresources'] = [];
            }
            // flags
            if (!empty($v['flags'])) {
                $data[$k]['flags'] = [];
                $temp = explode(';;', $v['flags']);
                foreach ($temp as $v2) {
                    $v2 = explode('::', $v2);
                    $data[$k]['flags'][(int) $v2[0]][(int)$v2[1]][(int) $v2[3]] = (int) $v2[2];
                }
            } else {
                $data[$k]['flags'] = [];
            }
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
