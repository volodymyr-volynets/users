<?php

class numbers_users_organizations_datasource_organizations extends object_datasource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['on_organization_id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = 'numbers_users_organizations_model_organizations';
	public $parameters = [
		'on_organization_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'on_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id_sequence'],
		'on_organization_code' => ['name' => 'Code', 'domain' => 'code'],
		'on_organization_type' => ['name' => 'Type', 'domain' => 'type_code'],
		'on_organization_name' => ['name' => 'Screen Name', 'domain' => 'name'],
		'on_organization_hold' => ['name' => 'Hold', 'type' => 'boolean'],
		'on_organization_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];

	public function query($parameters, $options = []) {
		$this->query->where_multiple('AND', $parameters);
	}
}