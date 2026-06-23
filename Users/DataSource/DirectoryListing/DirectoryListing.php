<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\DataSource\DirectoryListing;

use Object\DataSource;
use Helper\Tree;
use Numbers\Frontend\HTML\Renderers\Common\Helper\Colors;
use Numbers\Users\Users\Model\User\Types;
use Numbers\Users\Users\Model\Users;
use Numbers\Users\Organizations\Model\Organizations;
use Numbers\Users\Users\Model\Roles;
use Numbers\Users\Users\Model\Team\Map;
use Numbers\Users\Users\Model\Teams;
use Numbers\Users\Users\Model\Domains;
use Numbers\Users\Users\Model\Realms;
use Numbers\Users\Users\Model\Classifications;
use Numbers\Users\Users\Model\User\Groups;

class DirectoryListing extends DataSource
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
        'type' => 'type',
        'id' => 'id',
        'name' => 'name',
        'icon' => 'icon',
        'avatar' => 'avatar',
        'parent' => 'parent',
        'root' => 'root',
        'reference' => 'reference',
        'edit_url' => 'edit_url',
        'inactive' => 'inactive',
    ];
    public $options_active = [
        'inactive' => 0,
    ];
    public $column_prefix;

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Users\Users\Model\DirectoryListing\Types';
    public $parameters = [
        'only_type' => ['name' => 'Only Type', 'domain' => 'code'],
        'only_parent' => ['name' => 'Only Parent', 'domain' => 'big_id'],
    ];

    public function query($parameters, $options = [])
    {
        $type = $parameters['only_type'] ?? 'all';
        // columns
        $this->query->columns([
            'type' => "'dir_type'",
            'id' => "concat_ws('-', 'dir_type', a.um_dirlisttype_id)",
            'name' => 'a.um_dirlisttype_name',
            'icon' => 'a.um_dirlisttype_icon',
            'avatar' => 'null',
            'parent' => "concat_ws('-', 'dir_type', a.um_dirlisttype_parent_um_dirlisttype_id)",
            'root' => 'a.um_dirlisttype_root',
            'reference' => '0',
            'order2' => 10000,
            'inactive' => 'a.um_dirlisttype_inactive',
        ]);
        if ($type == 'dir_type' && !empty($parameters['only_parent'])) {
            $this->query->where('AND', ['a.um_dirlisttype_parent_um_dirlisttype_id', '=', $parameters['only_parent']]);
            $this->query->orderby(['name' => SORT_ASC]);
        }
        if ($type != 'all' && $type != 'dir_type') {
            $this->query->where('AND', 'false');
        }
        if ($type == 'user_type' || $type == 'all') {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters, $type) {
                $query2 =  Types::queryBuilderStatic(['alias' => 'b'])->select();
                $query2->columns([
                    'type' => "'user_type'",
                    'id' => "concat_ws('-', 'user_type', b.um_usrtype_id)",
                    'name' => 'b.um_usrtype_name',
                    'icon' => 'null',
                    'avatar' => "'avatar_circle_small'",
                    'parent' => "'dir_type-1100'", // a must
                    'root' => 0,
                    'reference' => 'b.um_usrtype_id',
                    'order2' => 11000,
                    'inactive' => 'b.um_usrtype_inactive',
                ]);
                if ($type == 'user_type' && !empty($parameters['only_parent'])) {
                    $query2->where('AND', ['b.um_usrtype_id', '=', $parameters['only_parent']]);
                }
                if ($type == 'user_type') {
                    $query2->orderby(['order2' => SORT_ASC, 'reference' => SORT_ASC]);
                }
            });
        }
        if ($type == 'users_by_type' || $type == 'all') {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters, $type) {
                $query2 =  Users::queryBuilderStatic(['alias' => 'c'])->select();
                $query2->columns([
                    'type' => "'users_by_type'",
                    'id' => "concat_ws('-', 'users_by_type', c.um_user_id)",
                    'name' => 'c.um_user_name',
                    'icon' => 'null',
                    'avatar' => "'avatar_user_small'",
                    'parent' => "concat_ws('-', 'user_type', c.um_user_type_id)", // a must
                    'root' => 0,
                    'reference' => 'c.um_user_id',
                    'order2' => 12000,
                    'inactive' => 'c.um_user_inactive',
                ]);
                if ($type == 'users_by_type' && !empty($parameters['only_parent'])) {
                    $query2->where('AND', ['c.um_user_type_id', '=', $parameters['only_parent']]);
                }
                if ($type == 'users_by_type') {
                    $query2->orderby(['order2' => SORT_ASC, 'reference' => SORT_ASC]);
                }
            });
        }
        if ($type == 'users_by_type2') {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters, $type) {
                $query2 =  Users::queryBuilderStatic(['alias' => 'c'])->select();
                $query2->columns([
                    'type' => "'users_by_type'",
                    'id' => "concat_ws('-', 'users_by_type', c.um_user_id)",
                    'name' => 'c.um_user_name',
                    'icon' => 'null',
                    'avatar' => "'avatar_user_small'",
                    'parent' => "concat_ws('-', 'user_type', c.um_user_type_id)", // a must
                    'root' => 0,
                    'reference' => 'c.um_user_id',
                    'order2' => 12000,
                    'inactive' => 'c.um_user_inactive',
                ]);
                if ($type == 'users_by_type2' && !empty($parameters['only_parent'])) {
                    $query2->where('AND', ['c.um_user_id', '=', $parameters['only_parent']]);
                    $query2->orderby(['order2' => SORT_ASC, 'reference' => SORT_ASC]);
                }
            });
        }
        if ($type == 'user_organization' || $type == 'all') {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters, $type) {
                $query2 =  \Numbers\Users\Users\Model\User\Organizations::queryBuilderStatic(['alias' => 'd'])->select();
                $query2->columns([
                    'type' => "'user_organization'",
                    'id' => "concat_ws('-', 'user_organization', d.um_usrorg_organization_id)",
                    'name' => 'inner_d.on_organization_name',
                    'icon' => "inner_d.on_organization_icon",
                    'avatar' => "'avatar_organization_small'",
                    'parent' => "'dir_type-1200'", // a must
                    'root' => 0,
                    'reference' => 'd.um_usrorg_organization_id',
                    'order2' => 13000,
                    'inactive' => 'd.um_usrorg_inactive',
                ]);
                $query2->join('INNER', new Organizations(), 'inner_d', 'ON', [
                    ['AND', ['d.um_usrorg_organization_id', '=', 'inner_d.on_organization_id', true], false]
                ]);
                if ($type == 'user_organization') {
                    $query2->orderby(['order2' => SORT_ASC, 'reference' => SORT_ASC]);
                }
            });
        }
        if ($type == 'user_organization_users' || $type == 'all') {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters, $type) {
                $query2 =  \Numbers\Users\Users\Model\User\Organizations::queryBuilderStatic(['alias' => 'e'])->select();
                $query2->columns([
                    'type' => "'user_organization_users'",
                    'id' => "concat_ws('-', 'user_organization_users', e.um_usrorg_user_id, e.um_usrorg_organization_id)",
                    'name' => 'inner_e.um_user_name',
                    'icon' => 'null',
                    'avatar' => "'avatar_user_small'",
                    'parent' => "concat_ws('-', 'user_organization', e.um_usrorg_organization_id)", // a must
                    'root' => 0,
                    'reference' => 'e.um_usrorg_user_id',
                    'order2' => 14000,
                    'inactive' => 'e.um_usrorg_inactive',
                ]);
                $query2->join('INNER', new Users(), 'inner_e', 'ON', [
                    ['AND', ['e.um_usrorg_user_id', '=', 'inner_e.um_user_id', true], false]
                ]);
                if ($type == 'user_organization_users' && !empty($parameters['only_parent'])) {
                    $query2->where('AND', ['e.um_usrorg_organization_id', '=', $parameters['only_parent']]);
                }
                if ($type == 'user_organization_users') {
                    $query2->orderby(['order2' => SORT_ASC, 'reference' => SORT_ASC]);
                }
            });
        }
        if ($type == 'user_role' || $type == 'all') {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters, $type) {
                $query2 =  \Numbers\Users\Users\Model\User\Roles::queryBuilderStatic(['alias' => 'e'])->select();
                $query2->columns([
                    'type' => "'user_role'",
                    'id' => "concat_ws('-', 'user_role', e.um_usrrol_role_id)",
                    'name' => 'inner_e.um_role_name',
                    'icon' => "inner_e.um_role_icon",
                    'avatar' => "'avatar_role_small'",
                    'parent' => "'dir_type-1300'", // a must
                    'root' => 0,
                    'reference' => 'e.um_usrrol_role_id',
                    'order2' => 13000,
                    'inactive' => 'e.um_usrrol_inactive',
                ]);
                $query2->join('INNER', new Roles(), 'inner_e', 'ON', [
                    ['AND', ['e.um_usrrol_role_id', '=', 'inner_e.um_role_id', true], false]
                ]);
                if ($type == 'user_role') {
                    $query2->orderby(['order2' => SORT_ASC, 'reference' => SORT_ASC]);
                }
            });
        }
        if ($type == 'user_role_users' || $type == 'all') {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters, $type) {
                $query2 =  \Numbers\Users\Users\Model\User\Roles::queryBuilderStatic(['alias' => 'f'])->select();
                $query2->columns([
                    'type' => "'user_role_users'",
                    'id' => "concat_ws('-', 'user_role_users', f.um_usrrol_user_id, f.um_usrrol_role_id)",
                    'name' => 'inner_f.um_user_name',
                    'icon' => 'null',
                    'avatar' => "'avatar_user_small'",
                    'parent' => "concat_ws('-', 'user_role', f.um_usrrol_role_id)", // a must
                    'root' => 0,
                    'reference' => 'f.um_usrrol_user_id',
                    'order2' => 14000,
                    'inactive' => 'f.um_usrrol_inactive',
                ]);
                $query2->join('INNER', new Users(), 'inner_f', 'ON', [
                    ['AND', ['f.um_usrrol_user_id', '=', 'inner_f.um_user_id', true], false]
                ]);
                if ($type == 'user_role_users' && !empty($parameters['only_parent'])) {
                    $query2->where('AND', ['f.um_usrrol_role_id', '=', $parameters['only_parent']]);
                }
                if ($type == 'user_role_users') {
                    $query2->orderby(['order2' => SORT_ASC, 'reference' => SORT_ASC]);
                }
            });
        }
        if ($type == 'user_team' || $type == 'all') {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters, $type) {
                $query2 =  Map::queryBuilderStatic(['alias' => 'g'])->select();
                $query2->columns([
                    'type' => "'user_team'",
                    'id' => "concat_ws('-', 'user_team', g.um_usrtmmap_team_id)",
                    'name' => 'inner_g.um_team_name',
                    'icon' => "inner_g.um_team_icon",
                    'avatar' => "'avatar_team_small'",
                    'parent' => "'dir_type-1400'", // a must
                    'root' => 0,
                    'reference' => 'g.um_usrtmmap_team_id',
                    'order2' => 15000,
                    'inactive' => 'g.um_usrtmmap_inactive',
                ]);
                $query2->join('INNER', new Teams(), 'inner_g', 'ON', [
                    ['AND', ['g.um_usrtmmap_team_id', '=', 'inner_g.um_team_id', true], false]
                ]);
                if ($type == 'user_team') {
                    $query2->orderby(['order2' => SORT_ASC, 'reference' => SORT_ASC]);
                }
            });
        }
        if ($type == 'user_team_users' || $type == 'all') {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters, $type) {
                $query2 =  Map::queryBuilderStatic(['alias' => 'h'])->select();
                $query2->columns([
                    'type' => "'user_team_users'",
                    'id' => "concat_ws('-', 'user_team_users', h.um_usrtmmap_user_id, h.um_usrtmmap_team_id)",
                    'name' => 'inner_h.um_user_name',
                    'icon' => 'null',
                    'avatar' => "'avatar_user_small'",
                    'parent' => "concat_ws('-', 'user_team', h.um_usrtmmap_team_id)", // a must
                    'root' => 0,
                    'reference' => 'h.um_usrtmmap_user_id',
                    'order2' => 16000,
                    'inactive' => 'h.um_usrtmmap_inactive',
                ]);
                $query2->join('INNER', new Users(), 'inner_h', 'ON', [
                    ['AND', ['h.um_usrtmmap_user_id', '=', 'inner_h.um_user_id', true], false]
                ]);
                if ($type == 'user_team_users' && !empty($parameters['only_parent'])) {
                    $query2->where('AND', ['h.um_usrtmmap_team_id', '=', $parameters['only_parent']]);
                }
                if ($type == 'user_team_users') {
                    $query2->orderby(['order2' => SORT_ASC, 'reference' => SORT_ASC]);
                }
            });
        }
        if ($type == 'user_domain' || $type == 'all') {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters, $type) {
                $query2 =  \Numbers\Users\Users\Model\Domain\Map::queryBuilderStatic(['alias' => 'i'])->select();
                $query2->columns([
                    'type' => "'user_domain'",
                    'id' => "concat_ws('-', 'user_domain', i.um_usrdommap_um_domain_id)",
                    'name' => 'inner_i.um_domain_name',
                    'icon' => "inner_i.um_domain_icon",
                    'avatar' => "'avatar_circle_small'",
                    'parent' => "'dir_type-1600'", // a must
                    'root' => 0,
                    'reference' => 'i.um_usrdommap_um_domain_id',
                    'order2' => 17000,
                    'inactive' => 'i.um_usrdommap_inactive',
                ]);
                $query2->join('INNER', new Domains(), 'inner_i', 'ON', [
                    ['AND', ['i.um_usrdommap_um_domain_id', '=', 'inner_i.um_domain_id', true], false]
                ]);
                if ($type == 'user_domain') {
                    $query2->orderby(['order2' => SORT_ASC, 'reference' => SORT_ASC]);
                }
            });
        }
        if ($type == 'user_domain_users' || $type == 'all') {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters, $type) {
                $query2 =  \Numbers\Users\Users\Model\Domain\Map::queryBuilderStatic(['alias' => 'j'])->select();
                $query2->columns([
                    'type' => "'user_domain_users'",
                    'id' => "concat_ws('-', 'user_domain_users', j.um_usrdommap_user_id, j.um_usrdommap_um_domain_id)",
                    'name' => 'inner_j.um_user_name',
                    'icon' => 'null',
                    'avatar' => "'avatar_user_small'",
                    'parent' => "concat_ws('-', 'user_domain', j.um_usrdommap_um_domain_id)", // a must
                    'root' => 0,
                    'reference' => 'j.um_usrdommap_user_id',
                    'order2' => 18000,
                    'inactive' => 'j.um_usrdommap_inactive',
                ]);
                $query2->join('INNER', new Users(), 'inner_j', 'ON', [
                    ['AND', ['j.um_usrdommap_user_id', '=', 'inner_j.um_user_id', true], false]
                ]);
                if ($type == 'user_domain_users' && !empty($parameters['only_parent'])) {
                    $query2->where('AND', ['j.um_usrdommap_um_domain_id', '=', $parameters['only_parent']]);
                }
                if ($type == 'user_domain_users') {
                    $query2->orderby(['order2' => SORT_ASC, 'reference' => SORT_ASC]);
                }
            });
        }
        if ($type == 'user_realm' || $type == 'all') {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters, $type) {
                $query2 =  \Numbers\Users\Users\Model\Realm\Map::queryBuilderStatic(['alias' => 'k'])->select();
                $query2->columns([
                    'type' => "'user_realm'",
                    'id' => "concat_ws('-', 'user_realm', k.um_usrreamap_um_realm_id)",
                    'name' => 'inner_k.um_realm_name',
                    'icon' => "inner_k.um_realm_icon",
                    'avatar' => "'avatar_circle_small'",
                    'parent' => "'dir_type-1500'", // a must
                    'root' => 0,
                    'reference' => 'k.um_usrreamap_um_realm_id',
                    'order2' => 19000,
                    'inactive' => 'k.um_usrreamap_inactive',
                ]);
                $query2->join('INNER', new Realms(), 'inner_k', 'ON', [
                    ['AND', ['k.um_usrreamap_um_realm_id', '=', 'inner_k.um_realm_id', true], false]
                ]);
                if ($type == 'user_realm') {
                    $query2->orderby(['order2' => SORT_ASC, 'reference' => SORT_ASC]);
                }
            });
        }
        if ($type == 'user_realm_users' || $type == 'all') {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters, $type) {
                $query2 =  \Numbers\Users\Users\Model\Realm\Map::queryBuilderStatic(['alias' => 'l'])->select();
                $query2->columns([
                    'type' => "'user_realm_users'",
                    'id' => "concat_ws('-', 'user_realm_users', l.um_usrreamap_user_id, l.um_usrreamap_um_realm_id)",
                    'name' => 'inner_l.um_user_name',
                    'icon' => 'null',
                    'avatar' => "'avatar_user_small'",
                    'parent' => "concat_ws('-', 'user_realm', l.um_usrreamap_um_realm_id)", // a must
                    'root' => 0,
                    'reference' => 'l.um_usrreamap_user_id',
                    'order2' => 20000,
                    'inactive' => 'l.um_usrreamap_inactive',
                ]);
                $query2->join('INNER', new Users(), 'inner_l', 'ON', [
                    ['AND', ['l.um_usrreamap_user_id', '=', 'inner_l.um_user_id', true], false]
                ]);
                if ($type == 'user_realm_users' && !empty($parameters['only_parent'])) {
                    $query2->where('AND', ['l.um_usrreamap_um_realm_id', '=', $parameters['only_parent']]);
                }
                if ($type == 'user_realm_users') {
                    $query2->orderby(['order2' => SORT_ASC, 'reference' => SORT_ASC]);
                }
            });
        }
        if ($type == 'user_group' || $type == 'all') {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters, $type) {
                $query2 =  \Numbers\Users\Users\Model\User\Group\Map::queryBuilderStatic(['alias' => 'm'])->select();
                $query2->columns([
                    'type' => "'user_group'",
                    'id' => "concat_ws('-', 'user_group', m.um_usrgrmap_group_id)",
                    'name' => 'inner_m.um_usrgrp_name',
                    'icon' => 'null',
                    'avatar' => "'avatar_circle_small'",
                    'parent' => "'dir_type-1700'", // a must
                    'root' => 0,
                    'reference' => 'm.um_usrgrmap_group_id',
                    'order2' => 21000,
                    'inactive' => 'inner_m.um_usrgrp_inactive',
                ]);
                $query2->join('INNER', new Groups(), 'inner_m', 'ON', [
                    ['AND', ['m.um_usrgrmap_group_id', '=', 'inner_m.um_usrgrp_id', true], false]
                ]);
                if ($type == 'user_group') {
                    $query2->orderby(['order2' => SORT_ASC, 'reference' => SORT_ASC]);
                }
            });
        }
        if ($type == 'user_group_users' || $type == 'all') {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters, $type) {
                $query2 =  \Numbers\Users\Users\Model\User\Group\Map::queryBuilderStatic(['alias' => 'n'])->select();
                $query2->columns([
                    'type' => "'user_group_users'",
                    'id' => "concat_ws('-', 'user_group_users', n.um_usrgrmap_user_id, n.um_usrgrmap_group_id)",
                    'name' => 'inner_n.um_user_name',
                    'icon' => 'null',
                    'avatar' => "'avatar_user_small'",
                    'parent' => "concat_ws('-', 'user_group', n.um_usrgrmap_group_id)", // a must
                    'root' => 0,
                    'reference' => 'n.um_usrgrmap_user_id',
                    'order2' => 22000,
                    'inactive' => '0',
                ]);
                $query2->join('INNER', new Users(), 'inner_n', 'ON', [
                    ['AND', ['n.um_usrgrmap_user_id', '=', 'inner_n.um_user_id', true], false]
                ]);
                if ($type == 'user_group_users' && !empty($parameters['only_parent'])) {
                    $query2->where('AND', ['n.um_usrgrmap_group_id', '=', $parameters['only_parent']]);
                }
                if ($type == 'user_group_users') {
                    $query2->orderby(['order2' => SORT_ASC, 'reference' => SORT_ASC]);
                }
            });
        }
        if ($type == 'user_classification' || $type == 'all') {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters, $type) {
                $query2 =  \Numbers\Users\Users\Model\Classification\Map::queryBuilderStatic(['alias' => 'o'])->select();
                $query2->columns([
                    'type' => "'user_classification'",
                    'id' => "concat_ws('-', 'user_classification', o.um_usrclsmap_um_classification_id)",
                    'name' => 'inner_o.um_classification_name',
                    'icon' => 'inner_o.um_classification_icon',
                    'avatar' => "'avatar_circle_small'",
                    'parent' => "'dir_type-1800'", // a must
                    'root' => 0,
                    'reference' => 'o.um_usrclsmap_um_classification_id',
                    'order2' => 23000,
                    'inactive' => 'o.um_usrclsmap_inactive',
                ]);
                $query2->join('INNER', new Classifications(), 'inner_o', 'ON', [
                    ['AND', ['o.um_usrclsmap_um_classification_id', '=', 'inner_o.um_classification_id', true], false]
                ]);
                if ($type == 'user_classification') {
                    $query2->orderby(['order2' => SORT_ASC, 'reference' => SORT_ASC]);
                }
            });
        }
        if ($type == 'user_classification_users' || $type == 'all') {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters, $type) {
                $query2 =  \Numbers\Users\Users\Model\Classification\Map::queryBuilderStatic(['alias' => 'p'])->select();
                $query2->columns([
                    'type' => "'user_classification_users'",
                    'id' => "concat_ws('-', 'user_classification_users', p.um_usrclsmap_user_id, p.um_usrclsmap_um_classification_id)",
                    'name' => 'inner_p.um_user_name',
                    'icon' => 'null',
                    'avatar' => "'avatar_user_small'",
                    'parent' => "concat_ws('-', 'user_classification', p.um_usrclsmap_um_classification_id)", // a must
                    'root' => 0,
                    'reference' => 'p.um_usrclsmap_user_id',
                    'order2' => 24000,
                    'inactive' => '0',
                ]);
                $query2->join('INNER', new Users(), 'inner_p', 'ON', [
                    ['AND', ['p.um_usrclsmap_user_id', '=', 'inner_p.um_user_id', true], false]
                ]);
                if ($type == 'user_classification_users' && !empty($parameters['only_parent'])) {
                    $query2->where('AND', ['p.um_usrclsmap_um_classification_id', '=', $parameters['only_parent']]);
                }
                if ($type == 'user_classification_users') {
                    $query2->orderby(['order2' => SORT_ASC, 'reference' => SORT_ASC]);
                }
                // last sort
                if ($type == 'all') {
                    $query2->orderby(['order2' => SORT_ASC, 'reference' => SORT_ASC]);
                }
            });
        }
    }

    public function process($data, $options = [])
    {
        // step 1 get all users
        foreach ($data as $k => $v) {
            $data[$k]['edit_url'] = null;
            switch ($v['type']) {
                case 'user_organization':
                    $data[$k]['edit_url'] = '/Numbers/Users/Organizations/Controller/Organizations/_Edit?on_organization_id=' . $v['reference'];
                    break;
                case 'user_role':
                    $data[$k]['edit_url'] = '/Numbers/Users/Users/Controller/Roles/_Edit?um_role_id=' . $v['reference'];
                    break;
                case 'user_team':
                    $data[$k]['edit_url'] = '/Numbers/Users/Users/Controller/Teams/_Edit?um_team_id=' . $v['reference'];
                    break;
                case 'user_realm':
                    $data[$k]['edit_url'] = '/Numbers/Users/Users/Controller/Realms/_Edit?um_realm_id=' . $v['reference'];
                    break;
                case 'user_domain':
                    $data[$k]['edit_url'] = '/Numbers/Users/Users/Controller/Domains/_Edit?um_domain_id=' . $v['reference'];
                    break;
                case 'user_group':
                    $data[$k]['edit_url'] = '/Numbers/Users/Users/Controller/Groups/_Edit?um_usrgrp_id=' . $v['reference'];
                    break;
                case 'user_classification':
                    $data[$k]['edit_url'] = '/Numbers/Users/Users/Controller/Classifications/_Edit?um_classification_id=' . $v['reference'];
                    break;
                case 'users_by_type':
                case 'user_organization_users':
                case 'user_role_users':
                case 'user_team_users':
                case 'user_domain_users':
                case 'user_realm_users':
                case 'user_group_users':
                    $data[$k]['edit_url'] = '/Numbers/Users/Users/Controller/Users/_Edit?um_user_id=' . $v['reference'];
                    break;
                default:
                    // nothing
            }
        }
        return $data;
    }

    /**
    * @see $this->options()
    */
    public function optionsGroupedConverted($options = [])
    {
        $result = $this->options($options);
        foreach ($result as $k => $v) {
            if (str_starts_with($v['icon'] . '', 'avatar_')) {
                $temp = explode('_', $v['icon']);
                $result[$k]['__avatar_rendered'] = Colors::renderAvatar($v['name'], $temp[1], $temp[2] == 'small');
            } elseif (!empty($v['avatar'])) {
                $temp = explode('_', $v['avatar']);
                $result[$k]['__avatar_rendered'] = Colors::renderAvatar($v['name'], $temp[1], $temp[2] == 'small');
            }
        }
        return Tree::convertByParent($result, 'parent');
    }
}
