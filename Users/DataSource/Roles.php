<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\DataSource;

use Numbers\Users\Users\Model\Role\Organizations;
use Object\DataSource;
use Object\Table\Options;

class Roles extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['um_role_id'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row;
    public $single_value;
    public $options_map = [
        'um_role_name' => 'name',
        'um_role_icon' => 'icon_class',
        'um_role_inactive' => 'inactive'
    ];
    public $options_active = [
        'um_role_inactive' => 0
    ];
    public $column_prefix = 'um_role_';

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = true;

    public $primary_model = '\Numbers\Users\Users\Model\Roles';
    public $parameters = [
        'selected_organizations' => ['name' => 'Selected Organizations', 'domain' => 'organization_id', 'multiple_column' => true],
        'existing_values' => ['name' => 'Existing Values', 'type' => 'mixed'],
        'organizations_for_current_user' => ['name' => 'Organizations For Current User', 'type' => 'boolean'],
        'skip_acl' => ['name' => 'Skip Acl', 'type' => 'boolean']
    ];

    public function query($parameters, $options = [])
    {
        // Organizations For Current User
        if (!empty($parameters['organizations_for_current_user'])) {
            $parameters['selected_organizations'] = \User::get('organizations');
        }
        // columns
        $this->query->columns(['a.*']);
        // selected organizations
        $this->query->where('AND', function (& $query) use ($parameters) {
            if (!empty($parameters['existing_values'])) {
                $query->where('OR', ['a.um_role_id', '=', $parameters['existing_values']]);
            }
            if (!empty($parameters['selected_organizations'])) {
                $query->where('OR', function (& $query) use ($parameters) {
                    $query = Organizations::queryBuilderStatic(['alias' => 'inner_a'])->select();
                    $query->columns(1);
                    $query->where('AND', ['inner_a.um_rolorg_role_id', '=', 'a.um_role_id', true]);
                    $query->where('AND', ['inner_a.um_rolorg_organization_id', 'IN', $parameters['selected_organizations'], false]);
                }, true);
            } else {
                $query->where('OR', function (& $query) use ($parameters) {
                    $query = Organizations::queryBuilderStatic(['alias' => 'inner_a'])->select();
                    $query->columns(1);
                    $query->where('AND', ['inner_a.um_rolorg_role_id', '=', 'a.um_role_id', true]);
                    $query->where('AND', ['inner_a.um_rolorg_organization_id', 'IS NOT', null, false]);
                }, true);
            }
            // super admins can create super admins
            if (\User::get('super_admin')) {
                $query->where('OR', ['a.um_role_super_admin', '=', 1]);
            }
        });
    }

    public function processNotCached($data, $options = [])
    {
        if (!\User::get('super_admin') && empty($options['parameters']['skip_acl'])) {
            foreach ($data as $k => $v) {
                // filter
                if (!Options::processOptionsExistingValuesAndSkipValues($v['um_role_id'], $options['existing_values'] ?? null, $options['skip_values'] ?? null)) {
                    unset($data[$k]);
                    continue;
                }
            }
        }
        return $data;
    }
}
