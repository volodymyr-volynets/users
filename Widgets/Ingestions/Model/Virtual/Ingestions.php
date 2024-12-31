<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Ingestions\Model\Virtual;

use Object\Table;

class Ingestions extends Table
{
    public $db_link;
    public $db_link_flag;
    public $name = null;
    public $pk = ['wg_ingestion_id'];
    public $tenant = true;
    public $module;
    public $orderby;
    public $limit;
    public $column_prefix = 'wg_ingestion_'; // must not change it
    public $columns = [];
    public $constraints = [];
    public $indexes = [];
    public $history = false;
    public $audit = false; // must not change it
    public $options_map = [];
    public $options_active = [];
    public $engine = [
        'MySQLi' => 'InnoDB'
    ];

    public $cache = false;
    public $cache_tags = [];
    public $cache_memory = false;

    public $relation; // must not change it
    public $attributes = false; // must not change it

    public $who = [
        'inserted' => true
    ];

    /**
     * Constructor
     */
    public function __construct($class, $virtual_class_name, $options = [])
    {
        // add regular columns
        $this->columns['wg_ingestion_tenant_id'] = ['name' => 'Tenant #', 'domain' => 'tenant_id'];
        $this->columns['wg_ingestion_id'] = ['name' => 'Ingestion #', 'domain' => 'big_id_sequence'];
        $this->determineModelMap($class, 'ingestions', $virtual_class_name, $options);
        $this->columns['wg_ingestion_timestamp'] = ['name' => 'Timestamp', 'type' => 'timestamp'];
        $this->columns['wg_ingestion_subject'] = ['name' => 'Subject', 'type' => 'text'];
        $this->columns['wg_ingestion_sender'] = ['name' => 'Sender', 'type' => 'text'];
        $this->columns['wg_ingestion_to'] = ['name' => 'To', 'type' => 'text'];
        $this->columns['wg_ingestion_body_id'] = ['name' => 'Body #', 'domain' => 'big_id'];
        // add constraints
        $this->constraints[$this->name . '_pk'] = [
            'type' => 'pk',
            'columns' => ['wg_ingestion_tenant_id', 'wg_ingestion_id']
        ];
        $this->constraints[$this->name . '_parent_fk'] = [
            'type' => 'fk',
            'columns' => array_values($this->map),
            'foreign_model' => $class,
            'foreign_columns' => array_keys($this->map)
        ];
        $this->constraints[$this->name . '_body_id_fk'] = [
            'type' => 'fk',
            'columns' => ['wg_ingestion_tenant_id', 'wg_ingestion_body_id'],
            'foreign_model' => '\Numbers\Users\Widgets\Ingestions\Model\EmailBodies',
            'foreign_columns' => ['wg_emailingbody_tenant_id', 'wg_emailingbody_id']
        ];
        // construct table
        parent::__construct($options);
    }
}
