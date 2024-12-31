<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Ingestions\Model;

use Object\Table;

class Locks extends Table
{
    public $db_link;
    public $db_link_flag;
    public $module_code = 'WG';
    public $title = 'W/G Email Ingestion Locks';
    public $schema;
    public $name = 'wg_email_ingestion_locks';
    public $pk = ['wg_emailinglock_tenant_id', 'wg_emailinglock_link', 'wg_emailinglock_uid', 'wg_emailinglock_timestamp'];
    public $tenant = true;
    public $orderby;
    public $limit;
    public $column_prefix = 'wg_emailinglock_';
    public $columns = [
        'wg_emailinglock_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
        'wg_emailinglock_link' => ['name' => 'Link', 'domain' => 'code'],
        'wg_emailinglock_uid' => ['name' => 'UID', 'domain' => 'big_id'],
        'wg_emailinglock_timestamp' => ['name' => 'Timestamp', 'domain' => 'timestamp_now'],
    ];
    public $constraints = [
        'wg_email_ingestion_locks_pk' => ['type' => 'pk', 'columns' => ['wg_emailinglock_tenant_id', 'wg_emailinglock_link', 'wg_emailinglock_uid', 'wg_emailinglock_timestamp']],
    ];
    public $indexes = [];
    public $history = false;
    public $audit = false;
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
