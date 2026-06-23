<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Chats\Model;

use Object\Table;
use Object\Traits\BatchesURLHelper;

class Canvases extends Table
{
    use BatchesURLHelper;

    public $db_link;
    public $db_link_flag;
    public $module_code = 'C5';
    public $title = 'C/5 Chat Canvases';
    public $schema;
    public $name = 'c5_chat_canvases';
    public $pk = ['c5_chatcanvas_tenant_id', 'c5_chatcanvas_code'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'c5_chatcanvas_';
    public $columns = [
        'c5_chatcanvas_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'c5_chatcanvas_code' => ['name' => 'Code', 'domain' => 'group_code'],
        'c5_chatcanvas_c5_canvastype_code' => ['name' => 'Type Code', 'domain' => 'group_code'],
        'c5_chatcanvas_name' => ['name' => 'Name', 'domain' => 'name'],
        'c5_chatcanvas_icon' => ['name' => 'Icon', 'domain' => 'icon', 'null' => true],
        'c5_chatcanvas_html_wysiwyg' => ['name' => 'HTML (wysiwyg)', 'type' => 'text', 'null' => true],
        'c5_chatcanvas_link_url' => ['name' => 'Link URL', 'domain' => 'url', 'null' => true],
        'c5_chatcanvas_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];

    public $constraints = [
        'c5_chat_canvases_pk' => ['type' => 'pk', 'columns' => ['c5_chatcanvas_tenant_id', 'c5_chatcanvas_code']],
    ];
    public $indexes = [
        'c5_chat_canvases_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['c5_chatcanvas_code', 'c5_chatcanvas_name']]
    ];
    public $history = false;
    public $audit = [];
    public $optimistic_lock = true;
    public $options_map = [
        'c5_chatcanvas_name' => 'name',
        'c5_chatcanvas_icon' => 'icon_class',
        'c5_chatcanvas_inactive' => 'inactive'
    ];
    public $options_active = [
        'c5_chatcanvas_inactive' => 0
    ];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $who = [
        'inserted' => true,
        'updated' => true
    ];

    public $batches = [
        'map' => [
            'c5_chatcanvas_tenant_id' => 'tm_batchrecord_tenant_id',
            'c5_chatcanvas_code' => 'tm_batchrecord_field_value_code'
        ],
        'where' => [
            'tm_batchrecord_sm_model_code' => '\Numbers\Users\Chats\Model\Canvases',
            'tm_batchrecord_field_code' => 'c5_chatcanvas_code',
        ],
        'edit' => [
            'batch_value' => 'tm_batchrecord_field_value_code',
            'batch_name' => 'C/5 Chat Canvas Code',
            'edit_endpoint' => '/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat',
            'edit_key' => 'c5_chatcanvas_code',
            'list_endpoint' => '/Numbers/Users/Chats/Controller/ChatPageStandalone/_Chat',
            'list_key' => ['c5_chatcanvas_code'],
        ],
    ];

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
