<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\DataSource\Assignment;

use Object\DataSource;
use Numbers\Users\Users\Model\Channels;

class UserToChannels extends DataSource
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
    public $options_active = [];
    public $column_prefix;

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Users\Users\Model\Channels';
    public $parameters = [
        'user_id' => ['name' => 'User #', 'domain' => 'user_id', 'required' => true],
        'organizations' => ['name' => 'Organizations', 'domain' => 'organization_id[]'],
        'roles' => ['name' => 'Roles', 'domain' => 'role_id[]'],
        'teams' => ['name' => 'Teams', 'domain' => 'team_id[]'],
        'groups' => ['name' => 'Groups', 'domain' => 'group_id[]'],
    ];

    public function query($parameters, $options = [])
    {
        // columns
        $this->query->columns([
            'code' => 'a.um_channel_code',
            'name' => 'a.um_channel_name',
            'type' => 'a.um_channel_um_chantype_code',
            'field_id' => 'a.um_channel_field_id',
            'field_code' => 'a.um_channel_field_code'
        ]);
        $this->query->where('AND', ['a.um_channel_um_chantype_code', 'IN', ['UM::USERS', 'SM::EMAILS', 'SM::SMS', 'SM::WHATSAPP']]);
        $this->query->where('AND', ['a.um_channel_field_id', '=', $parameters['user_id']]);
        // roles
        if (!empty($parameters['roles'])) {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters) {
                $query2 =  Channels::queryBuilderStatic(['skip_acl' => true, 'alias' => 'inner_roles'])->select();
                $query2->columns([
                    'code' => 'inner_roles.um_channel_code',
                    'name' => 'inner_roles.um_channel_name',
                    'type' => 'inner_roles.um_channel_um_chantype_code',
                    'field_id' => 'inner_roles.um_channel_field_id',
                    'field_code' => 'inner_roles.um_channel_field_code'
                ]);
                $query2->where('AND', ['inner_roles.um_channel_um_chantype_code', '=', 'UM::ROLES']);
                $query2->where('AND', ['inner_roles.um_channel_field_id', '=', $parameters['roles']]);
            });
        }
        // teams
        if (!empty($parameters['teams'])) {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters) {
                $query2 =  Channels::queryBuilderStatic(['skip_acl' => true, 'alias' => 'inner_teams'])->select();
                $query2->columns([
                    'code' => 'inner_teams.um_channel_code',
                    'name' => 'inner_teams.um_channel_name',
                    'type' => 'inner_teams.um_channel_um_chantype_code',
                    'field_id' => 'inner_teams.um_channel_field_id',
                    'field_code' => 'inner_teams.um_channel_field_code'
                ]);
                $query2->where('AND', ['inner_teams.um_channel_um_chantype_code', '=', 'UM::TEAMS']);
                $query2->where('AND', ['inner_teams.um_channel_field_id', '=', $parameters['teams']]);
            });
        }
        // groups
        if (!empty($parameters['groups'])) {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters) {
                $query2 =  Channels::queryBuilderStatic(['skip_acl' => true, 'alias' => 'inner_groups'])->select();
                $query2->columns([
                    'code' => 'inner_groups.um_channel_code',
                    'name' => 'inner_groups.um_channel_name',
                    'type' => 'inner_groups.um_channel_um_chantype_code',
                    'field_id' => 'inner_groups.um_channel_field_id',
                    'field_code' => 'inner_groups.um_channel_field_code'
                ]);
                $query2->where('AND', ['inner_groups.um_channel_um_chantype_code', '=', 'UM::GROUPS']);
                $query2->where('AND', ['inner_groups.um_channel_field_id', '=', $parameters['groups']]);
            });
        }
        // groups
        if (!empty($parameters['organizations'])) {
            $this->query->union('UNION ALL', function (& $query2) use ($parameters) {
                $query2 =  Channels::queryBuilderStatic(['skip_acl' => true, 'alias' => 'inner_organizations'])->select();
                $query2->columns([
                    'code' => 'inner_organizations.um_channel_code',
                    'name' => 'inner_organizations.um_channel_name',
                    'type' => 'inner_organizations.um_channel_um_chantype_code',
                    'field_id' => 'inner_organizations.um_channel_field_id',
                    'field_code' => 'inner_organizations.um_channel_field_code'
                ]);
                $query2->where('AND', ['inner_organizations.um_channel_um_chantype_code', '=', 'ON::ORGANIZATONS']);
                $query2->where('AND', ['inner_organizations.um_channel_field_id', '=', $parameters['organizations']]);
            });
        }
    }
}
