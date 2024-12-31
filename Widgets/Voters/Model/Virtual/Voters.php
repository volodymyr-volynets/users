<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Widgets\Voters\Model\Virtual;

use Object\Table;

class Voters extends Table
{
    public $db_link;
    public $db_link_flag;
    public $name = null;
    public $pk = ['wg_voter_id'];
    public $tenant = true;
    public $module;
    public $orderby;
    public $limit;
    public $column_prefix = 'wg_voter_'; // must not change it
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
        $this->columns['wg_voter_tenant_id'] = ['name' => 'Tenant #', 'domain' => 'tenant_id'];
        $this->columns['wg_voter_id'] = ['name' => 'Voter #', 'domain' => 'big_id_sequence'];
        $this->determineModelMap($class, 'voters', $virtual_class_name, $options);
        $this->columns['wg_voter_vtrtype_code'] = ['name' => 'Voter Code', 'domain' => 'type_code'];
        $this->columns['wg_voter_ownertype_id'] = ['name' => 'Owner Type #', 'domain' => 'type_id'];
        $this->columns['wg_voter_user_id'] = ['name' => 'User #', 'domain' => 'user_id'];
        $this->columns['wg_voter_yes'] = ['name' => 'Yes', 'type' => 'boolean'];
        $this->columns['wg_voter_no'] = ['name' => 'No', 'type' => 'boolean'];
        $this->columns['wg_voter_other'] = ['name' => 'Other', 'type' => 'boolean'];
        // add constraints
        $this->constraints[$this->name . '_pk'] = [
            'type' => 'pk',
            'columns' => ['wg_voter_tenant_id', 'wg_voter_id']
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
        $data['wg_voter_id'] = $this->sequence('wg_voter_id');
        $data['wg_voter_tenant_id'] = \Tenant::id();
        $result = $this->db_object->insert($this->full_table_name, [$data]);
        $this->resetCache(); // reset cache tags
        return $result;
    }
}
