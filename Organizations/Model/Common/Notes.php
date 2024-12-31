<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Model\Common;

use Object\Table;

class Notes extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'ON';
    public $title = 'O/N Common Notes';
    public $schema;
    public $name = 'on_common_notes';
    public $pk = ['on_comnote_tenant_id', 'on_comnote_id'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'on_comnote_';
    public $columns = [
        'on_comnote_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'on_comnote_id' => ['name' => 'Note #', 'domain' => 'group_id_sequence'],
        'on_comnote_type_code' => ['name' => 'Type', 'domain' => 'type_code', 'options_model' => '\Numbers\Users\Organizations\Model\Common\Note\Types'],
        'on_comnote_comment' => ['name' => 'Comment', 'domain' => 'comment'],
        'on_comnote_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
    ];
    public $constraints = [
        'on_common_notes_pk' => ['type' => 'pk', 'columns' => ['on_comnote_tenant_id', 'on_comnote_id']],
    ];
    public $indexes = [
        'on_common_notes_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['on_comnote_comment']],
    ];
    public $history = false;
    public $audit = [
        'map' => [
            'on_comnote_tenant_id' => 'wg_audit_tenant_id',
            'on_comnote_id' => 'wg_audit_note_id'
        ]
    ];
    public $optimistic_lock = true;
    public $options_map = [];
    public $options_active = [];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = true;
    public $cache_tags = [];
    public $cache_memory = false;

    public $data_asset = [
        'classification' => 'client_confidential',
        'protection' => 2,
        'scope' => 'enterprise'
    ];
}
