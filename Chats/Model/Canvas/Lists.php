<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Model\Canvas;

use Object\Table;

class Lists extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'C5';
    public $title = 'C/5 Chat Canvas Lists';
    public $schema;
    public $name = 'c5_chat_canvas_lists';
    public $pk = ['c5_chatcanvslist_tenant_id', 'c5_chatcanvslist_id'];
    public $tenant = true;
    public $orderby = [
        'c5_chatcanvslist_order' => SORT_ASC,
    ];
    public $limit;
    public $column_prefix = 'c5_chatcanvslist_';
    public $columns = [
        'c5_chatcanvslist_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'c5_chatcanvslist_id' => ['name' => 'List #', 'domain' => 'big_id_sequence'],
        'c5_chatcanvslist_c5_chatcanvas_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'c5_chatcanvslist_name' => ['name' => 'Name', 'domain' => 'name'],
        'c5_chatcanvslist_description' => ['name' => 'Description', 'domain' => 'description', 'null' => true],
        'c5_chatcanvslist_order' => ['name' => 'Order', 'domain' => 'order', 'default' => 0],
        'c5_chatcanvslist_group' => ['name' => 'Group', 'domain' => 'name', 'null' => true],
        'c5_chatcanvslist_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];

    public $constraints = [
        'c5_chat_canvas_lists_pk' => ['type' => 'pk', 'columns' => ['c5_chatcanvslist_tenant_id', 'c5_chatcanvslist_id']],
        'c5_chatcanvslist_c5_chatcanvas_code_fk' => [
            'type' => 'fk',
            'columns' => ['c5_chatcanvslist_tenant_id', 'c5_chatcanvslist_c5_chatcanvas_code'],
            'foreign_model' => '\Numbers\Users\Chats\Model\Canvases',
            'foreign_columns' => ['c5_chatcanvas_tenant_id', 'c5_chatcanvas_code']
        ],
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
