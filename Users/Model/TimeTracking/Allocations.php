<?php

namespace Numbers\Users\Users\Model\TimeTracking;
class Allocations extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'UM';
	public $title = 'U/M Time Tracking Allocations';
	public $name = 'um_time_tracking_allocations';
	public $pk = ['um_ttallocation_tenant_id', 'um_ttallocation_id'];
	public $tenant = true;
	public $module = false;
	public $orderby = [
		'um_ttallocation_id' => SORT_ASC
	];
	public $limit;
	public $column_prefix = 'um_ttallocation_';
	public $columns = [
		'um_ttallocation_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'um_ttallocation_id' => ['name' => 'Allocation #', 'domain' => 'big_id_sequence'],
		'um_ttallocation_um_ownertype_id' => ['name' => 'U/M Owner Type #', 'domain' => 'type_id', 'null' => true],
		'um_ttallocation_um_user_id' => ['name' => 'User #', 'domain' => 'user_id'],
		'um_ttallocation_um_user_name' => ['name' => 'User Name', 'domain' => 'name'],
		'um_ttallocation_on_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
		// link to the record
		'um_ttallocation_record_module_id' => ['name' => 'Module #', 'domain' => 'module_id'],
		'um_ttallocation_record_id' => ['name' => 'Record #', 'domain' => 'big_id'],
		'um_ttallocation_record_detail_id' => ['name' => 'Record Detail #', 'domain' => 'big_id'],
		'um_ttallocation_record_resource_id' => ['name' => 'Record Resource #', 'domain' => 'resource_id'],
		// controller name and params for links
		'um_ttallocation_sm_resource_name' => ['name' => 'S/M Resource Name', 'domain' => 'name'], // controller name
		'um_ttallocation_params' => ['name' => 'Params', 'type' => 'json'],
		// time
		'um_ttallocation_start' => ['name' => 'Start', 'type' => 'datetime'],
		'um_ttallocation_finish' => ['name' => 'Finish', 'type' => 'datetime', 'null' => true],
		// duration
		'um_ttallocation_duration_in_hours' => ['name' => 'Duration In Hours', 'domain' => 'float_counter'],
		// other
		'um_ttallocation_inactive' => ['name' => 'Inactive', 'type' => 'boolean'],
	];
	public $constraints = [
		'um_time_tracking_allocations_pk' => ['type' => 'pk', 'columns' => ['um_ttallocation_tenant_id', 'um_ttallocation_id']],
		'um_ttallocation_um_user_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_ttallocation_tenant_id', 'um_ttallocation_um_user_id'],
			'foreign_model' => \Numbers\Users\Users\Model\Users::class,
			'foreign_columns' => ['um_user_tenant_id', 'um_user_id']
		],
		'um_ttallocation_um_ownertype_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_ttallocation_tenant_id', 'um_ttallocation_um_ownertype_id'],
			'foreign_model' => \Numbers\Users\Users\Model\User\Owner\Types::class,
			'foreign_columns' => ['um_ownertype_tenant_id', 'um_ownertype_id']
		],
		'um_ttallocation_on_organization_id_fk' => [
			'type' => 'fk',
			'columns' => ['um_ttallocation_tenant_id', 'um_ttallocation_on_organization_id'],
			'foreign_model' => \Numbers\Users\Organizations\Model\Organizations::class,
			'foreign_columns' => ['on_organization_tenant_id', 'on_organization_id']
		]
	];
	public $indexes = [];
	public $history = false;
	public $audit = [];
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

	public $attributes = [];

	public $comments = [];

	public $documents = [];

	public $tags = [];

	public $data_asset = [
		'classification' => 'client_confidential',
		'protection' => 2,
		'scope' => 'enterprise'
	];

	/**
	 * Load total allocations per detail
	 *
	 * @param string $sm_resource_name
	 * @param int $record_module_id - pass 0 if no module
	 * @param int $record_id
	 * @param int|null $record_detail_id
	 * @return array
	 */
	public static function loadTotalAllocations(string $sm_resource_name, int $record_module_id, int $record_id, ?int $record_detail_id = null) : array {
		$query = \Numbers\Users\Users\Model\TimeTracking\Allocations::queryBuilderStatic(['alias' => 'a'])->select();
		$query->columns([
			'record_id' => 'a.um_ttallocation_record_id',
			'record_detail_id' => 'a.um_ttallocation_record_detail_id',
			'tracked_hours' => 'SUM(a.um_ttallocation_duration_in_hours)',
			'counter' => 'COUNT(*)',
			'is_tracked' => 'SUM(CASE WHEN a.um_ttallocation_finish IS NULL THEN 1 ELSE 0 END)',
			'last_allocation_id' => 'MAX(a.um_ttallocation_id)',
			'last_start' => 'MAX(CASE WHEN a.um_ttallocation_finish IS NULL THEN a.um_ttallocation_start ELSE null END)',
		]);
		$query->where('AND', ['a.um_ttallocation_sm_resource_name', '=', $sm_resource_name]);
		$query->where('AND', ['a.um_ttallocation_record_module_id', '=', $record_module_id]);
		$query->where('AND', ['a.um_ttallocation_record_id', '=', $record_id]);
		if (isset($record_detail_id)) {
			$query->where('OR', ['a.um_ttallocation_record_detail_id', '=', $record_detail_id]);
		}
		$query->groupby(['record_id', 'record_detail_id']);
		$result = $query->query(['record_id', 'record_detail_id']);
		if ($result['success']) {
			foreach ($result['rows'] as $k => $v) {
				foreach ($v as $k2 => $v2) {
					if ($v2['is_tracked']) {
						$result['rows'][$k][$k2]['unfinished_hours'] = round(\Helper\Date::diff($v2['last_start'], \Format::now('datetime'), 'abs hours', false), 2);
						$result['rows'][$k][$k2]['total_hours'] = \Math::add($v2['tracked_hours'], $result['rows'][$k][$k2]['unfinished_hours'], 2);
					} else {
						$result['rows'][$k][$k2]['unfinished_hours'] = 0;
						$result['rows'][$k][$k2]['total_hours'] = $v2['tracked_hours'];
					}
				}
			}
		}
		return $result;
	}

	/**
	 * Load total allocations per resource
	 *
	 * @param string $sm_resource_name
	 * @param int $record_module_id - pass 0 if no module
	 * @param int $record_id
	 * @return array
	 */
	public static function loadTotalAllocationResources(string $sm_resource_name, int $record_module_id, array $record_id) : array {
		$query = \Numbers\Users\Users\Model\TimeTracking\Allocations::queryBuilderStatic(['alias' => 'a'])->select();
		$query->columns([
			'record_id' => 'a.um_ttallocation_record_id',
			'record_resource_id' => 'a.um_ttallocation_record_resource_id',
			'tracked_hours' => 'SUM(a.um_ttallocation_duration_in_hours)',
			'counter' => 'COUNT(*)',
			'is_tracked' => 'SUM(CASE WHEN a.um_ttallocation_finish IS NULL THEN 1 ELSE 0 END)',
			'last_allocation_id' => 'MAX(a.um_ttallocation_id)',
			'last_start' => 'MAX(CASE WHEN a.um_ttallocation_finish IS NULL THEN a.um_ttallocation_start ELSE null END)',
		]);
		$query->where('AND', ['a.um_ttallocation_sm_resource_name', '=', $sm_resource_name]);
		$query->where('AND', ['a.um_ttallocation_record_module_id', '=', $record_module_id]);
		$query->where('AND', ['a.um_ttallocation_record_id', 'IN', $record_id]);
		$query->groupby(['record_id', 'record_resource_id']);
		$result = $query->query(['record_id', 'record_resource_id']);
		if ($result['success']) {
			foreach ($result['rows'] as $k => $v) {
				foreach ($v as $k2 => $v2) {
					if ($v2['is_tracked']) {
						$result['rows'][$k][$k2]['unfinished_hours'] = round(\Helper\Date::diff($v2['last_start'], \Format::now('datetime'), 'abs hours', false), 2);
						$result['rows'][$k][$k2]['total_hours'] = \Math::add($v2['tracked_hours'], $result['rows'][$k][$k2]['unfinished_hours'], 2);
					} else {
						$result['rows'][$k][$k2]['unfinished_hours'] = 0;
						$result['rows'][$k][$k2]['total_hours'] = $v2['tracked_hours'];
					}
				}
			}
		}
		return $result;
	}
}