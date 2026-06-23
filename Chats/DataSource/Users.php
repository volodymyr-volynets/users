<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\DataSource;

use Object\DataSource;
use Numbers\Users\Users\Model\User\Mentions;
use Numbers\Frontend\HTML\Renderers\Common\Helper\Colors;

class Users extends DataSource
{
    public $db_link;
    public $db_link_flag;
    public $pk = ['id'];
    public $columns;
    public $orderby;
    public $limit;
    public $single_row = false;
    public $single_value;
    public $options_map = [
        'name' => 'name',
        'mention' => 'name',
        'id' => 'name',
        'inactive' => 'inactive',
    ];
    public $options_active = [
        'inactive' => 0,
    ];
    public $column_prefix;

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Users\Users\Model\Users';
    public $parameters = [
        'um_user_name' => ['name' => 'Name', 'domain' => 'name'],
        'skip_current_user' => ['name' => 'Skip Current User', 'type' => 'boolean'],
    ];

    public function query($parameters, $options = [])
    {
        // columns
        $this->query->columns([
            'id' => 'a.um_user_id',
            'name' => 'a.um_user_name',
            'mention' => 'b.mention_string',
            'inactive' => 'a.um_user_inactive'
        ]);
        // join
        $this->query->join('LEFT', function (& $query) use ($parameters) {
            $query = Mentions::queryBuilderStatic(['alias' => 'b'])->select();
            $query->columns(columns: [
                'b.um_usrmention_user_id',
                'mention_string' => $query->db_object->sqlHelper('string_agg', ['expression' => "b.um_usrmention_mention", 'delimiter' => ', '])
            ]);
            $query->groupby(['b.um_usrmention_user_id']);
        }, 'b', 'ON', [
            ['AND', ['a.um_user_id', '=', 'b.um_usrmention_user_id', true], false]
        ]);
        // where
        if (!empty($parameters['um_user_name'])) {
            $this->query->where('AND', function (& $query) use ($parameters) {
                $query->where('OR', function (& $query) use ($parameters) {
                    $query = Mentions::queryBuilderStatic(['alias' => 'exists_a'])->select();
                    $query->columns(['exists_a.um_usrmention_mention']);
                    $query->where('AND', ['exists_a.um_usrmention_mention', 'LIKE%', $parameters['um_user_name']]);
                }, 'EXISTS');
                $query->where('OR', ['a.um_user_name', 'LIKE%', $parameters['um_user_name']]);
            });
        }
        if (!empty($parameters['skip_current_user'])) {
            $this->query->where('AND', ['a.um_user_id', '<>', \User::id()]);
        }
        $this->query->orderby(['name' => SORT_ASC]);
    }

    /**
     * @see $this->options()
     */
    public function optionsProcessed($options = [])
    {
        $data = $this->get($options);
        $result = [];
        foreach ($data as $k => $v) {
            $key = $v['id'];
            $result[$key] = $v;
            $temp = \User::id() == $key ? (' (' . loc('NF.Form.You', 'you') . ')') : '';
            $result[$key]['name'] = $v['name'] . ' ' . $v['mention'] . ' #' . $v['id'] . $temp;
            $result[$key]['__selected_name'] = $v['name'] . ' #' . $v['id'];
            // avatar colors
            $result[$key]['avatar_colors'] = Colors::getColorsAndInitials($v['name']);
        }
        return $result;
    }

    /**
     * @see $this->options()
     */
    public function optionsActiveProcessed($options = [])
    {
        $data = $this->options($options);
        $result = [];
        foreach ($data as $k => $v) {
            $key = $k;
            $result[$key] = $v;
            // avatar colors
            $result[$key]['avatar_colors'] = Colors::getColorsAndInitials($v['name']);
        }
        return $result;
    }
}
