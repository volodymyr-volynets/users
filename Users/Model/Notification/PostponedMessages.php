<?php

namespace Numbers\Users\Users\Model\Notification;
class PostponedMessages extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M Notification Postponed Messages';
	public $schema;
	public $name = 'um_notification_postponed_messages';
	public $pk = ['um_notpostmess_tenant_id', 'um_notpostmess_id'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'um_notpostmess_';
	public $columns = [
		'um_notpostmess_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_notpostmess_id' => ['name' => 'Message #', 'domain' => 'message_id_sequence'],
		'um_notpostmess_inserted_timestamp' => ['name' => 'Timestamp Inserted', 'domain' => 'timestamp_now'],
		'um_notpostmess_method' => ['name' => 'Method', 'type' => 'text'],
		'um_notpostmess_params' => ['name' => 'Params', 'type' => 'json', 'null' => true],
		'um_notpostmess_completed_timestamp' => ['name' => 'Timestamp Completed', 'type' => 'timestamp', 'null' => true],
		'um_notpostmess_last_timestamp' => ['name' => 'Last Timestamp', 'type' => 'timestamp', 'null' => true],
		'um_notpostmess_last_message' => ['name' => 'Last Message', 'type' => 'text', 'null' => true],
		'um_notpostmess_sm_log_originated_id' => ['name' => 'Log Originated #', 'domain' => 'uuid', 'null' => true],
	];
	public $constraints = [
		'um_notification_postponed_messages_pk' => ['type' => 'pk', 'columns' => ['um_notpostmess_tenant_id', 'um_notpostmess_id']],
	];
	public $indexes = [
		'um_notpostmess_completed_timestamp_idx' => ['type' => 'btree', 'columns' => ['um_notpostmess_tenant_id', 'um_notpostmess_completed_timestamp']]
	];
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

	public $who = [];

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];
}