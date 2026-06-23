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
use Numbers\Users\Chats\Model\Channels;

class ChatOptions extends DataSource
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
        'id' => 'id',
        'name' => 'name',
        'inactive' => 'inactive',
    ];
    public $options_active = [
        'inactive' => 0,
    ];
    public $column_prefix;

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $primary_model = '\Numbers\Users\Chats\Model\Chats';
    public $parameters = [];

    public function query($parameters, $options = [])
    {
        // columns
        $this->query->columns([
            'id' => 'a.c5_chat_id',
            'name' => "concat_ws(' ', COALESCE(g.c5_chatchannel_mention, a.c5_chat_name), '; Chat # ', a.c5_chat_id)",
            'inactive' => 'a.c5_chat_inactive',
        ]);
        $this->query->join('LEFT', new Channels(), 'g', 'ON', [
            ['AND', ['a.c5_chat_c5_chatchannel_code', '=', 'g.c5_chatchannel_code', true], false],
        ]);
    }

    public function process($data, $options = [])
    {
        // step 1 get all users
        foreach ($data as $k => $v) {
            if ($v['channel_name']) {
                //$data[$k]['name'] = '#' . $v['channel_name'];
            }
        }
        return $data;
    }
}
