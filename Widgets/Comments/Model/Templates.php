<?php

namespace Numbers\Users\Widgets\Comments\Model;
class Templates extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M Note Templates';
	public $schema;
	public $name = 'um_note_templates';
	public $pk = ['um_notetemplate_tenant_id', 'um_notetemplate_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'um_notetemplate_';
	public $columns = [
		'um_notetemplate_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_notetemplate_id' => ['name' => 'Template #', 'domain' => 'group_id_sequence'],
		'um_notetemplate_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
		'um_notetemplate_name' => ['name' => 'Name', 'domain' => 'name'],
		'um_notetemplate_template' => ['name' => 'Template', 'domain' => 'comment'],
		'um_notetemplate_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'um_note_templates_pk' => ['type' => 'pk', 'columns' => ['um_notetemplate_tenant_id', 'um_notetemplate_id']],
	];
	public $indexes = [
		'um_note_templates_fulltext_idx' => ['type' => 'fulltext', 'columns' => ['um_notetemplate_name', 'um_notetemplate_template']],
	];
	public $history = false;
	public $audit = [
		'map' => [
			'um_notetemplate_tenant_id' => 'wg_audit_tenant_id',
			'um_notetemplate_id' => 'wg_audit_notetemplate_id'
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