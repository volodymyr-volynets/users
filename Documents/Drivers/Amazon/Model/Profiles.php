<?php

namespace Numbers\Users\Documents\Drivers\Amazon\Model;
class Profiles extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'DT';
	public $title = 'D/T Amazon Profiles';
	public $name = 'dt_amazon_profiles';
	public $pk = ['dt_amzprofile_tenant_id', 'dt_amzprofile_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'dt_amzprofile_';
	public $columns = [
		'dt_amzprofile_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'dt_amzprofile_id' => ['name' => 'Profile #', 'domain' => 'profile_id_sequence'],
		'dt_amzprofile_name' => ['name' => 'Name', 'domain' => 'name'],
		'dt_amzprofile_bucket' => ['name' => 'Bucket', 'domain' => 'name'],
		'dt_amzprofile_region' => ['name' => 'Region', 'domain' => 'name'],
		'dt_amzprofile_aws_access_key_id' => ['name' => 'Access Key', 'domain' => 'encrypted_password'],
		'dt_amzprofile_aws_secret_access_key' => ['name' => 'Secret Access Key', 'domain' => 'encrypted_password'],
		'dt_amzprofile_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'dt_amazon_profiles_pk' => ['type' => 'pk', 'columns' => ['dt_amzprofile_tenant_id', 'dt_amzprofile_id']],
	];
	public $indexes = [];
	public $history = false;
	public $audit = [
		'map' => [
			'dt_amzprofile_tenant_id' => 'wg_audit_tenant_id',
			'dt_amzprofile_id' => 'wg_audit_amzprofile_id'
		]
	];
	public $optimistic_lock = true;
	public $options_map = [
		'dt_amzprofile_name' => 'name',
		'dt_amzprofile_inactive' => 'inactive'
	];
	public $options_active = [
		'dt_amzprofile_inactive' => 0
	];
	public $engine = [
		'MySQLi' => 'InnoDB'
	];

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $data_asset = [
		'classification' => 'proprietary',
		'protection' => 1,
		'scope' => 'global'
	];
}