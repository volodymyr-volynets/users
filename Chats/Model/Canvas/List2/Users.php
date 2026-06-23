<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Model\Canvas\List2;

use Object\Table;

class Users extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'C5';
    public $title = 'C/5 Chat Canvas List Users';
    public $schema;
    public $name = 'c5_chat_canvas_list_users';
    public $pk = ['c5_chatcanvslstuser_tenant_id', 'c5_chatcanvslstuser_c5_chatcanvslist_id', 'c5_chatcanvslstuser_c5_chat_id', 'c5_chatcanvslstuser_um_user_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'c5_chatcanvslstuser_';
    public $columns = [
        'c5_chatcanvslstuser_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'c5_chatcanvslstuser_c5_chatcanvslist_id' => ['name' => 'List #', 'domain' => 'big_id'],
        'c5_chatcanvslstuser_um_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
        'c5_chatcanvslstuser_c5_chat_id' => ['name' => 'Chat #', 'domain' => 'chat_id'],
        'c5_chatcanvslstuser_c5_chatcanvas_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'c5_chatcanvslstuser_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];

    public $constraints = [
        'c5_chat_canvas_list_users_pk' => ['type' => 'pk', 'columns' => ['c5_chatcanvslstuser_tenant_id', 'c5_chatcanvslstuser_c5_chatcanvslist_id', 'c5_chatcanvslstuser_c5_chat_id', 'c5_chatcanvslstuser_um_user_id']],
        'c5_chatcanvslstuser_c5_chatcanvas_code_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatcanvslstuser_tenant_id', 'c5_chatcanvslstuser_c5_chatcanvas_code'],
            'foreign_model' => '\Numbers\Users\Chats\Model\Canvases',
            'foreign_columns' => ['c5_chatcanvas_tenant_id', 'c5_chatcanvas_code']
        ],
        'c5_chatcanvslstuser_um_user_id_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatcanvslstuser_tenant_id', 'c5_chatcanvslstuser_um_user_id'],
            'foreign_model' => '\Numbers\Users\Users\Model\Users',
            'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
        ],
        'c5_chatcanvslstuser_c5_chatcanvslist_id_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatcanvslstuser_tenant_id', 'c5_chatcanvslstuser_c5_chatcanvslist_id'],
            'foreign_model' => '\Numbers\Users\Chats\Model\Canvas\Lists',
            'foreign_columns' => ['c5_chatcanvslist_tenant_id', 'c5_chatcanvslist_id']
        ],
        'c5_chatcanvslstuser_c5_chat_id_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatcanvslstuser_tenant_id', 'c5_chatcanvslstuser_c5_chat_id'],
            'foreign_model' => '\Numbers\Users\Chats\Model\Chats',
            'foreign_columns' => ['c5_chat_tenant_id', 'c5_chat_id']
        ]
    ];
    public $indexes = [];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = false;
    public $options_map = [];
    public $options_active = [];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
