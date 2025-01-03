<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Comments\Model\Virtual;

use Object\Table;

class Comments extends Table
{
    public $db_link;
    public $db_link_flag;
    public $name = null;
    public $pk = ['wg_comment_id'];
    public $tenant = true;
    public $module;
    public $orderby;
    public $limit;
    public $column_prefix = 'wg_comment_'; // must not change it
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
        $this->columns['wg_comment_tenant_id'] = ['name' => 'Tenant #', 'domain' => 'tenant_id'];
        $this->columns['wg_comment_id'] = ['name' => 'Comment #', 'domain' => 'big_id_sequence'];
        $this->determineModelMap($class, 'comments', $virtual_class_name, $options);
        $this->columns['wg_comment_value'] = ['name' => 'Comment', 'domain' => 'comment'];
        $this->columns['wg_comment_important'] = ['name' => 'Important', 'type' => 'boolean'];
        $this->columns['wg_comment_public'] = ['name' => 'Public', 'type' => 'boolean'];
        $this->columns['wg_comment_file_1'] = ['name' => 'File 1', 'domain' => 'file_id', 'null' => true];
        $this->columns['wg_comment_file_2'] = ['name' => 'File 2', 'domain' => 'file_id', 'null' => true];
        $this->columns['wg_comment_file_3'] = ['name' => 'File 3', 'domain' => 'file_id', 'null' => true];
        $this->columns['wg_comment_file_4'] = ['name' => 'File 4', 'domain' => 'file_id', 'null' => true];
        $this->columns['wg_comment_file_5'] = ['name' => 'File 5', 'domain' => 'file_id', 'null' => true];
        $this->columns['wg_comment_file_6'] = ['name' => 'File 6', 'domain' => 'file_id', 'null' => true];
        $this->columns['wg_comment_file_7'] = ['name' => 'File 7', 'domain' => 'file_id', 'null' => true];
        $this->columns['wg_comment_file_8'] = ['name' => 'File 8', 'domain' => 'file_id', 'null' => true];
        $this->columns['wg_comment_file_9'] = ['name' => 'File 9', 'domain' => 'file_id', 'null' => true];
        $this->columns['wg_comment_file_10'] = ['name' => 'File 10', 'domain' => 'file_id', 'null' => true];
        $this->columns['wg_comment_followup_datetime'] = ['name' => 'Followup Datetime', 'type' => 'datetime', 'null' => true];
        // api fields
        $this->columns['wg_comment_inserted_user_name'] = ['name' => 'Inserted User Name', 'type' => 'text', 'null' => true];
        $this->columns['wg_comment_external_integtype_code'] = ['name' => 'External Integration Type Code', 'domain' => 'group_code', 'null' => true];
        $this->columns['wg_comment_external_id'] = ['name' => 'External #', 'domain' => 'big_id', 'default' => null, 'null' => true];
        $this->columns['wg_comment_action_required'] = ['name' => 'Action Required', 'type' => 'boolean'];
        // add constraints
        $this->constraints[$this->name . '_pk'] = [
            'type' => 'pk',
            'columns' => ['wg_comment_tenant_id', 'wg_comment_id']
        ];
        $this->constraints[$this->name . '_parent_fk'] = [
            'type' => 'fk',
            'columns' => array_values($this->map),
            'foreign_model' => $class,
            'foreign_columns' => array_keys($this->map)
        ];
        // construct table
        parent::__construct($options);
    }

    /**
     * Merge
     *
     * @param array $data
     * @param array $options
     * @return array
     */
    public function merge($data, $options = [])
    {
        $this->processWhoColumns(['inserted'], $data);
        $data['wg_comment_id'] = $this->sequence('wg_comment_id');
        $data['wg_comment_tenant_id'] = \Tenant::id();
        $result = $this->db_object->insert($this->full_table_name, [$data]);
        $this->resetCache(); // reset cache tags
        return $result;
    }
}
