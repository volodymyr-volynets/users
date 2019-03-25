<?php

namespace Numbers\Users\Widgets\Ingestions\Model;
class EmailBodies extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'WG';
	public $title = 'W/G Email Ingestion Bodies';
	public $schema;
	public $name = 'wg_email_ingestion_bodies';
	public $pk = ['wg_emailingbody_tenant_id', 'wg_emailingbody_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'wg_emailingbody_';
	public $columns = [
		'wg_emailingbody_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'wg_emailingbody_id' => ['name' => 'Body #', 'domain' => 'big_id_sequence'],
		'wg_emailingbody_message' => ['name' => 'Message', 'type' => 'bytea'],
	];
	public $constraints = [
		'wg_email_ingestion_bodies_pk' => ['type' => 'pk', 'columns' => ['wg_emailingbody_tenant_id', 'wg_emailingbody_id']],
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