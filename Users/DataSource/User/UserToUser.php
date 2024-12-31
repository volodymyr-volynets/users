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

use Numbers\Users\Users\Model\User\Assignments;
use Object\DataSource;
use Object\Query\Builder;

class UserToUser extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = [];
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

    public $primary_model;
    public $parameters = [
        'user_id' => ['name' => 'User #', 'domain' => 'user_id', 'required' => true],
    ];

    public function query($parameters, $options = [])
    {
        $user_id = $parameters['user_id'];
        $this->query = Builder::quick()->withRecursive('temp_user_env_2000', ['id', 'child_id'], function (& $query) use ($user_id) {
            $query = Assignments::queryBuilderStatic(['skip_acl' => true, 'alias' => 'inner_a'])->select();
            $query->columns([
                'id' => 'inner_a.um_usrassign_parent_user_id',
                'child_id' => 'inner_a.um_usrassign_child_user_id'
            ]);
            $query->where('AND', ['inner_a.um_usrassign_parent_user_id', '=', $user_id]);
            $query->union('UNION ALL', function (& $query2) {
                $query2 = Assignments::queryBuilderStatic(['skip_acl' => true, 'alias' => 'inner_b'])->select();
                $query2->columns([
                    'id' => 'inner_b.um_usrassign_parent_user_id',
                    'child_id' => 'inner_b.um_usrassign_child_user_id'
                ]);
                $query2->from('temp_user_env_2000', 'inner_b2');
                $query2->where('AND', ['inner_b.um_usrassign_parent_user_id', '=', 'inner_b2.child_id', true]);
            });
        });
    }

    public function process($data, $options = [])
    {
        return array_merge([$options['parameters']['user_id']], array_extract_values_by_key($data, 'child_id'));
    }
}
