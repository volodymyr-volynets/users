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

use Numbers\Backend\System\Modules\Model\Resource\APIMethods;
use Numbers\Backend\System\Modules\Model\Resource\Actions;
use Numbers\Backend\System\Modules\Model\Resource\Map;
use Numbers\Backend\System\Modules\Model\Resource\Tenants;
use Numbers\Tenants\Tenants\Model\Module\Features;
use Numbers\Tenants\Tenants\Model\Modules;
use Object\DataSource;

class Controllers extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['code'];
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

    public $primary_model = '\Numbers\Backend\System\Modules\Model\Resources';
    public $primary_params = ['skip_acl' => true];
    public $parameters = [
        'sm_resource_acl_permission' => ['name' => 'Acl Permission', 'type' => 'boolean'],
        'sm_resource_type' => ['name' => 'Type', 'domain' => 'type_id'],
    ];

    public function query($parameters, $options = [])
    {
        $this->query->columns([
            'id' => 'a.sm_resource_id',
            'code' => 'a.sm_resource_code',
            'name' => 'a.sm_resource_name',
            'description' => 'a.sm_resource_description',
            'classification' => 'a.sm_resource_classification',
            'icon' => 'a.sm_resource_icon',
            'module_code' => 'a.sm_resource_module_code',
            'module_codes' => 'a.sm_resource_extra_module_code',
            'breadcrumbs' => "concat_ws('::', b.sm_module_name, a.sm_resource_group1_name, a.sm_resource_group2_name, sm_resource_group3_name, sm_resource_group4_name, sm_resource_group5_name, sm_resource_group6_name, sm_resource_group7_name, sm_resource_group8_name, sm_resource_group9_name)",
            'actions' => 'c.actions',
            'acl_public' => 'a.sm_resource_acl_public',
            'acl_authorized' => 'a.sm_resource_acl_authorized',
            'acl_permission' => 'a.sm_resource_acl_permission',
            'missing_features' => 'COALESCE(d.missing_features, 0)',
            'template' => 'a.sm_resource_template_name',
            'api_methods' => 'f.api_methods',
        ]);
        // join
        $this->query->join('LEFT', new \Numbers\Backend\System\Modules\Model\Modules(), 'b', 'ON', [
            ['AND', ['a.sm_resource_module_code', '=', 'b.sm_module_code', true], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            // need to see if modules have not been activated
            $query = Map::queryBuilderStatic(['alias' => 'inner_a'])->select();
            $query->columns([
                'inner_a.sm_rsrcmp_resource_id',
                'actions' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_a.sm_rsrcmp_method_code, inner_a.sm_rsrcmp_action_id, inner_b.sm_action_code)", 'delimiter' => ';;'])
            ]);
            // join
            $query->join('INNER', new Actions(), 'inner_b', 'ON', [
                ['AND', ['inner_a.sm_rsrcmp_action_id', '=', 'inner_b.sm_action_id', true], false]
            ]);
            $query->groupby(['sm_rsrcmp_resource_id']);
            $query->where('AND', ['inner_a.sm_rsrcmp_inactive', '=', 0]);
            $query->where('AND', ['inner_b.sm_action_inactive', '=', 0]);
        }, 'c', 'ON', [
            ['AND', ['a.sm_resource_id', '=', 'c.sm_rsrcmp_resource_id', true], false]
        ]);
        $this->query->join('LEFT', function (& $query) {
            $query = \Numbers\Backend\System\Modules\Model\Resource\Features::queryBuilderStatic(['alias' => 'inner_a'])->select();
            $query->columns([
                'resource_id' => 'inner_a.sm_rsrcftr_resource_id',
                'missing_features' => 'SUM(CASE WHEN inner_b.tm_feature_feature_code IS NULL THEN 1 ELSE 0 END)'
            ]);
            $query->join('LEFT', new Features(), 'inner_b', 'ON', [
                ['AND', ['inner_b.tm_feature_feature_code', '=', 'inner_a.sm_rsrcftr_feature_code', true]]
            ]);
            $query->groupby(['resource_id']);
        }, 'd', 'ON', [
            ['AND', ['a.sm_resource_id', '=', 'd.resource_id', true], false]
        ]);
        // tenant
        $tenant_code = strtoupper(\Application::get('application.structure.settings.tenant.code') ?? 'DEFAULT');
        $this->query->join('LEFT', new Tenants(), 'e', 'ON', [
            ['AND', ['a.sm_resource_id', '=', 'e.sm_rsrctenant_resource_id', true], false],
            ['AND', ['e.sm_rsrctenant_tenant_code', '=', $tenant_code], false],
            ['AND', ['e.sm_rsrctenant_inactive', '=', 0], false],
        ]);
        // api methods
        $this->query->join('LEFT', function (& $query) {
            $query = APIMethods::queryBuilderStatic(['alias' => 'inner_api'])->select();
            $query->columns([
                'resource_id' => 'inner_api.sm_rsrcapimeth_resource_id',
                'api_methods' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_api.sm_rsrcapimeth_method_code, inner_api.sm_rsrcapimeth_method_name)", 'delimiter' => ';;'])
            ]);
            $query->where('AND', ['inner_api.sm_rsrcapimeth_inactive', '=', 0]);
            $query->groupby(['resource_id']);
        }, 'f', 'ON', [
            ['AND', ['a.sm_resource_id', '=', 'f.resource_id', true], false]
        ]);
        // where
        if (empty($parameters['sm_resource_type'])) {
            $parameters['sm_resource_type'] = [100, 150];
        }
        $this->query->where('AND', ['a.sm_resource_inactive', '=', 0]);
        if (!empty($parameters)) {
            foreach ($parameters as $k => $v) {
                $this->query->where('AND', ["a.{$k}", '=', $v]);
            }
        }
        // requires tenants
        $this->query->where('AND', function (& $query) {
            $query->where('OR', ['a.sm_resource_requires_tenants', '=', 0]);
            $query->where('OR', ['e.sm_rsrctenant_tenant_code', 'IS NOT', null]);
        });
        // limit by activated modules
        $this->query->where('AND', function (& $query) {
            $query->where('OR', ['a.sm_resource_module_code', 'IN', ['SM', 'TM']]);
            $query->where('OR', function (& $query) {
                $query = Modules::queryBuilderStatic(['alias' => 'exists_a'])->select();
                $query->columns(['exists_a.tm_module_module_code']);
                $query->where('AND', ['exists_a.tm_module_module_code', '=', 'a.sm_resource_module_code', true]);
            }, 'EXISTS');
        });
    }

    public function process($data, $options = [])
    {
        foreach ($data as $k => $v) {
            $data[$k]['breadcrumbs'] = explode('::', $v['breadcrumbs']);
            $data[$k]['actions'] = [];
            if (!empty($v['actions'])) {
                $actions = explode(';;', $v['actions']);
                foreach ($actions as $v2) {
                    $temp = explode('::', $v2);
                    $data[$k]['actions'][$temp[0]][(int) $temp[1]] = $temp[2];
                }
            }
            $data[$k]['api_methods'] = [];
            if (!empty($v['api_methods'])) {
                $api_methods = explode(';;', $v['api_methods']);
                foreach ($api_methods as $v2) {
                    $temp = explode('::', $v2);
                    $data[$k]['api_methods'][$temp[0]] = $temp[1];
                }
            }
            $data[$k]['module_codes'] = [];
            if (!empty($v['module_codes'])) {
                $data[$k]['module_codes'] = explode(',', trim($v['module_codes']));
            }
            if (!in_array($v['module_code'], $data[$k]['module_codes'])) {
                $data[$k]['module_codes'][] = $v['module_code'];
            }
            // unset codes
            unset($data[$k]['code']);
        }
        return $data;
    }
}
