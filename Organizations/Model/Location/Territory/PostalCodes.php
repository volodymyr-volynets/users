<?php

namespace Numbers\Users\Organizations\Model\Location\Territory;
class PostalCodes extends \Object\Table {
	public $db_link;
	public $db_link_flag;
	public $module_code = 'ON';
	public $title = 'O/N Territory Locations';
	public $name = 'on_territory_postal_codes';
	public $pk = ['on_terrpostal_tenant_id', 'on_terrpostal_territory_id', 'on_terrpostal_organization_id', 'on_terrpostal_location_id', 'on_terrpostal_postal_code'];
	public $tenant = true;
	public $orderby;
	public $limit;
	public $column_prefix = 'on_terrpostal_';
	public $columns = [
		'on_terrpostal_tenant_id' => ['name' => 'Tenant #', 'domain' => 'tenant_id'],
		'on_terrpostal_territory_id' => ['name' => 'Territory #', 'domain' => 'territory_id'],
		'on_terrpostal_organization_id' => ['name' => 'Organization #', 'domain' => 'organization_id'],
		'on_terrpostal_location_id' => ['name' => 'Location #', 'domain' => 'location_id'],
		'on_terrpostal_postal_code' => ['name' => 'Postal Code', 'domain' => 'postal_code'],
		'on_terrpostal_inactive' => ['name' => 'Inactive', 'type' => 'boolean']
	];
	public $constraints = [
		'on_territory_postal_codes_pk' => ['type' => 'pk', 'columns' => ['on_terrpostal_tenant_id', 'on_terrpostal_territory_id', 'on_terrpostal_organization_id', 'on_terrpostal_location_id', 'on_terrpostal_postal_code']],
		'on_terrpostal_territory_id_fk' => [
			'type' => 'fk',
			'columns' => ['on_terrpostal_tenant_id', 'on_terrpostal_territory_id'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Location\Territories',
			'foreign_columns' => ['on_territory_tenant_id', 'on_territory_id']
		],
		'on_terrpostal_location_id_fk' => [
			'type' => 'fk',
			'columns' => ['on_terrpostal_tenant_id', 'on_terrpostal_location_id'],
			'foreign_model' => '\Numbers\Users\Organizations\Model\Locations',
			'foreign_columns' => ['on_location_tenant_id', 'on_location_id']
		]
	];
	public $indexes = [];
	public $history = false;
	public $audit = false;
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

	/**
	 * Trigger to update postal codes from territories
	 *
	 * @param string $type
	 * @param array $data
	 * @param array $audit
	 * @return array
	 */
	public function triggerUpdatePostalCodesFromTerritory(string $type, array $data, array $audit = []) : array {
		$result = [
			'success' => false,
			'error' => []
		];
		// step 1 delete
		$query = $this->queryBuilder()->delete();
		$query->where('AND', ['a.on_terrpostal_territory_id', '=', $data['on_territory_id']]);
		$delete_result = $query->query();
		if (!$delete_result['success']) {
			$result['error']+= $delete_result['error'];
			return $result;
		}
		// step 2 process postal codes
		$postal_codes = explode(' ', strtoupper(trim2($data['on_territory_postal_codes'])));
		if ($data['on_territory_country_code'] == 'CA') {
			$postal_codes2 = $postal_codes;
			$postal_codes = [];
			foreach ($postal_codes2 as $v) {
				if (strlen($v) == 6) {
					$postal_codes[] = $v;
				} else if (strlen($v) < 6) {
					$postal_one = \Numbers\Countries\Countries\Model\PostalCodes::getStatic([
						'where' => [
							'cm_postal_country_code' => $data['on_territory_country_code'],
							'cm_postal_postal_code;LIKE' => $v . '%'
						],
						'pk' => ['cm_postal_postal_code'],
						'columns' => ['cm_postal_postal_code']
					]);
					if (!empty($postal_one)) {
						$postal_codes+= array_keys($postal_one);
					}
				}
			}
		}
		// add postal codes
		foreach ($postal_codes as $k => $v) {
			foreach ($data['\Numbers\Users\Organizations\Model\Location\Territory\Locations'] as $k2 => $v2) {
				$merge_result = $this->collection()->merge([
					'on_terrpostal_territory_id' => $data['on_territory_id'],
					'on_terrpostal_organization_id' => $data['on_territory_organization_id'],
					'on_terrpostal_location_id' => $v2['on_terrloc_location_id'],
					'on_terrpostal_postal_code' => $v,
					'on_terrpostal_inactive' => 0
				]);
				if (!$merge_result['success']) {
					$result['error']+= $merge_result['error'];
					return $result;
				}
			}
		}
		$result['success'] = true;
		return $result;
	}
}