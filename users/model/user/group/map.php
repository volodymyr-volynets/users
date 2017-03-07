<?php

class numbers_data_entities_entities_model_groupmap extends object_table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'EM';
	public $title = 'E/M Group Map';
	public $name = 'em_entity_group_map';
	public $pk = ['em_entgrmp_entity_id', 'em_entgrmp_group_id'];
	public $orderby;
	public $limit;
	public $column_prefix = 'em_entgrmp_';
	public $columns = [
		'em_entgrmp_entity_id' => ['name' => 'Entity #', 'domain' => 'entity_id'],
		'em_entgrmp_group_id' => ['name' => 'Group #', 'domain' => 'group_id']
	];
	public $constraints = [
		'em_entity_group_map_pk' => ['type' => 'pk', 'columns' => ['em_entgrmp_entity_id', 'em_entgrmp_group_id']],
		'em_entgrmp_entity_id_fk' => [
			'type' => 'fk',
			'columns' => ['em_entgrmp_entity_id'],
			'foreign_model' => 'numbers_data_entities_entities_model_entities',
			'foreign_columns' => ['em_entity_id'],
			'options' => [
				'match' => 'simple',
				'update' => 'no action',
				'delete' => 'no action'
			]
		],
		'em_entgrmp_group_id_fk' => [
			'type' => 'fk',
			'columns' => ['em_entgrmp_group_id'],
			'foreign_model' => 'numbers_data_entities_entities_model_groups',
			'foreign_columns' => ['em_entgrp_id'],
			'options' => [
				'match' => 'simple',
				'update' => 'no action',
				'delete' => 'no action'
			]
		]
	];
	public $history = false;
	public $audit = false;
	public $options_map = [];
	public $options_active = [];
	public $engine = [
		'mysqli' => 'InnoDB'
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