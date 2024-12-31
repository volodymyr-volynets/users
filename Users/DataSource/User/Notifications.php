<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\DataSource\User;

use Numbers\Users\Users\Model\Role\Children;
use Numbers\Users\Users\Model\Team\Map;
use Numbers\Users\Users\Model\User\Roles;
use Object\DataSource;
use Object\Query\Builder;

class Notifications extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['user_id'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $options_map = [];
    public $options_active = [];
    public $column_prefix;

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Users\Users\Model\User\Notifications';
    public $parameters = [
        'selected_organizations' => ['name' => 'Selected Organizations', 'domain' => 'organization_id', 'multiple_column' => true],
        'module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
        'feature_code' => ['name' => 'Feature Code', 'domain' => 'feature_code'],
        'user_ids' => ['name' => 'Iser(s) #', 'domain' => 'user_id', 'multiple_column' => true],
    ];

    public function query($parameters, $options = [])
    {
        $this->query->columns([
            'user_id' => 'a.um_usrnoti_user_id',
        ]);
        $this->query->union('UNION', function (& $query) use ($parameters) {
            $query = Roles::queryBuilderStatic(['alias' => 'b'])->select();
            $query->columns([
                'b.um_usrrol_user_id',
            ]);
            $query->where('AND', function (& $query) use ($parameters) {
                $query = \Numbers\Users\Users\Model\Role\Notifications::queryBuilderStatic(['alias' => 'inner_b'])->select();
                $query->columns(1);
                $query->where('AND', ['inner_b.um_rolnoti_role_id', '=', 'b.um_usrrol_role_id', true]);
                $query->where('AND', ['inner_b.um_rolnoti_feature_code', '=', $parameters['feature_code'], false]);
                $query->where('AND', ['inner_b.um_rolnoti_module_id', '=', $parameters['module_id'], false]);
            }, 'EXISTS');
            if (!empty($parameters['user_ids'])) {
                $query->where('AND', ['b.um_usrrol_user_id', '=', $parameters['user_ids'], false]);
            }
        });
        $this->query->union('UNION', function (& $query) use ($parameters) {
            $query = Map::queryBuilderStatic(['alias' => 'c'])->select();
            $query->columns([
                'c.um_usrtmmap_user_id',
            ]);
            $query->where('AND', function (& $query) use ($parameters) {
                $query = \Numbers\Users\Users\Model\Team\Notifications::queryBuilderStatic(['alias' => 'inner_c'])->select();
                $query->columns(1);
                $query->where('AND', ['inner_c.um_temnoti_team_id', '=', 'c.um_usrtmmap_team_id', true]);
                $query->where('AND', ['inner_c.um_temnoti_feature_code', '=', $parameters['feature_code'], false]);
                $query->where('AND', ['inner_c.um_temnoti_module_id', '=', $parameters['module_id'], false]);
            }, 'EXISTS');
            if (!empty($parameters['user_ids'])) {
                $query->where('AND', ['c.um_usrtmmap_user_id', '=', $parameters['user_ids'], false]);
            }
        });
        $this->query->union('UNION', function (& $query) use ($parameters) {
            $query2 = Builder::quick()->withRecursive('temp_rol_env_1000', ['id', 'parent_id'], function (& $query) use ($parameters) {
                $query = Children::queryBuilderStatic(['skip_acl' => true, 'alias' => 'inner_a'])->select();
                $query->columns([
                    'id' => 'inner_a.um_rolrol_parent_role_id',
                    'parent_id' => 'inner_a.um_rolrol_child_role_id'
                ]);
                $query->where('AND', function (& $query) use ($parameters) {
                    $query = \Numbers\Users\Users\Model\Role\Notifications::queryBuilderStatic(['alias' => 'inner_b'])->select();
                    $query->columns(1);
                    $query->where('AND', ['inner_b.um_rolnoti_role_id', '=', 'inner_a.um_rolrol_parent_role_id', true]);
                    $query->where('AND', ['inner_b.um_rolnoti_feature_code', '=', $parameters['feature_code'], false]);
                    $query->where('AND', ['inner_b.um_rolnoti_module_id', '=', $parameters['module_id'], false]);
                }, 'EXISTS');
                $query->union('UNION ALL', function (& $query2) {
                    $query2 =  Children::queryBuilderStatic(['skip_acl' => true, 'alias' => 'inner_c'])->select();
                    $query2->columns([
                        'id' => 'inner_c.um_rolrol_child_role_id',
                        'parent_id' => 'inner_c.um_rolrol_parent_role_id'
                    ]);
                    $query2->from('temp_rol_env_1000', 'inner_b2');
                    $query2->where('AND', ['inner_c.um_rolrol_parent_role_id', '=', 'inner_b2.id', true]);
                });
            });
            $query->columns([
                'inner_e.um_usrrol_user_id',
            ]);
            $query->from($query2, 'inner_d');
            $query->join('LEFT', new Roles(), 'inner_e', 'ON', [
                ['AND', ['inner_e.um_usrrol_role_id', '=', 'inner_d.id', true], false]
            ]);
            if (!empty($parameters['user_ids'])) {
                $query->where('AND', ['inner_e.um_usrrol_user_id', '=', $parameters['user_ids'], false]);
            }
        });
        $this->query->where('AND', ['a.um_usrnoti_feature_code', '=', $parameters['feature_code'], false]);
        $this->query->where('AND', ['a.um_usrnoti_module_id', '=', $parameters['module_id'], false]);
        if (!empty($parameters['user_ids'])) {
            $this->query->where('AND', ['a.um_usrnoti_user_id', '=', $parameters['user_ids'], false]);
        }
    }
}
