<?php

namespace Numbers\Users\Users\DataSource\Assignment;
class ServiceProviders extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['um_user_id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map =[
		'um_user_name' => 'name',
		'um_user_inactive' => 'inactive'
	];
	public $options_active =[
		'um_user_inactive' => 0
	];
	public $column_prefix = 'um_user_';

	public $cache = false;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = '\Numbers\Users\Users\Model\Users';
	public $parameters = [
		'selected_organizations' => ['name' => 'Selected Organizations', 'domain' => 'organization_id', 'required' => true],
		'assignment_type_id' => ['name' => 'Assignment Type', 'domain' => 'type_id'],
		'service_id' => ['name' => 'Service #', 'domain' => 'service_id', 'required' => true],
		'location_id' => ['name' => 'Location #', 'domain' => 'location_id', 'required' => true],
		'country_code' => ['name' => 'Country', 'domain' => 'country_code'],
		'province_code' => ['name' => 'Province', 'domain' => 'province_code'],
		'postal_code' => ['name' => 'Postal Code', 'domain' => 'postal_code'],
		'territory_id' => ['name' => 'Territory', 'domain' => 'territory_id'],
		'address' => ['name' => 'Address', 'type' => 'text'],
		'limit' => ['name' => 'Limit', 'type' => 'smallint', 'required' => true],
	];

	public function query($parameters, $options = []) {
		// fetch queue type
		$temp = \Numbers\Users\Organizations\Model\Services::queryBuilderStatic()->select()->columns(['on_service_queue_type_id'])->where('AND', ['a.on_service_id', '=', $parameters['service_id']])->query(null);
		$service_data = $temp['rows'][0] ?? [];
		// generate hash
		$hash = 'ORG::' . $parameters['selected_organizations'] . '::QUEUE::' . $service_data['on_service_queue_type_id'] . '::SERV::' . $parameters['service_id'] . '::LOC::' . $parameters['location_id'];
		switch ($parameters['assignment_type_id']) {
			case 13: $parameters['filter_by_territory_postal_code'] = 1; break;
			case 17: $parameters['filter_by_territory_county'] = 1; break;
			case 20: $parameters['filter_by_direct_postal_code'] = 1; break;
			case 30: $parameters['filter_by_location_assignment'] = 1; break;
			case 40: $parameters['filter_by_geo_assignment'] = 1; break;
			default: $this->query->where('AND', 'FALSE');
		}
		// columns
		$this->query->columns([
			'um_user_id' => 'a.um_user_id',
			'um_user_name' => 'a.um_user_name',
			'um_user_inactive' => 'a.um_user_inactive',
			'last_timestamp' => 'COALESCE(d.last_timestamp, a.um_user_inserted_timestamp)',
			'last_records_count' => 'd.last_records_count',
			'total_records_count' => 'd.total_records_count',
			'percent_records' => 'COALESCE(d.last_records_count / d.total_records_count * 100, 0)',
			'hash' => "'{$hash}'",
			'queue_type_id' => $service_data['on_service_queue_type_id'],
		]);
		// joins
		$query2 = \Numbers\Users\Organizations\Model\Queue\OwnerTypes::queryBuilderStatic(['alias' => 'subquery2'])->select()->columns(['on_ownertype_id'])->where('AND', ['subquery2.on_ownertype_code', '=', 'SP']);
		$this->query->join('INNER', new \Numbers\Users\Users\Model\User\Assignment\Queues(), 'b', 'ON', [
			['AND', ['a.um_user_id', '=', 'b.um_usrassqueue_user_id', true], false],
			['AND', ['b.um_usrassqueue_owner_type_id', 'IN', '(' . $query2->sql() . ')', true], false],
			['AND', ['b.um_usrassqueue_queue_type_id', '=', $service_data['on_service_queue_type_id'], false], false]
		]);
		$this->query->join('LEFT', function (& $query) use ($parameters, $service_data, $hash) {
			$query3 = \Numbers\Users\Users\Model\Queues::queryBuilderStatic(['alias' => 'inner_x'])
				->select()
				->columns(['count' => 'COUNT(*)'])
				->where('AND', ['inner_x.um_queue_hash', '=', $hash])
				->where('AND', ['inner_x.um_queue_type_id', '=', $service_data['on_service_queue_type_id']])
				->where('AND', ['inner_x.um_queue_inactive', '=', 0])
				->where('AND', function (& $query) {
					$query->where('OR', ['inner_x.um_queue_temporary_until', 'IS', null]);
					$query->where('OR', ['inner_x.um_queue_temporary_until', '>', \Format::now('timestamp'), false]);
			});
			$query = \Numbers\Users\Users\Model\Queues::queryBuilderStatic(['alias' => 'inner_v'])->select();
			$query->columns([
				'user_id' => 'inner_v.um_queue_user_id',
				'last_records_count' => 'COUNT(*)',
				'last_timestamp' => 'MAX(inner_v.um_queue_inserted_timestamp)',
				'total_records_count' => '(' . $query3->sql() . ')'
			]);
			$query->groupby(['inner_v.um_queue_user_id']);
			$query->where('AND', ['inner_v.um_queue_hash', '=', $hash]);
			$query->where('AND', ['inner_v.um_queue_type_id', '=', $service_data['on_service_queue_type_id']]);
			$query->where('AND', ['inner_v.um_queue_inactive', '=', 0]);
			$query->where('AND', function (& $query) {
				$query->where('OR', ['inner_v.um_queue_temporary_until', 'IS', null]);
				$query->where('OR', ['inner_v.um_queue_temporary_until', '>', \Format::now('timestamp'), false]);
			});
		}, 'd', 'ON', [
			['AND', ['d.user_id', '=', 'a.um_user_id', true], false],
		]);
		// selected organizations
		if (!empty($parameters['selected_organizations'])) {
			$this->query->where('AND', function (& $query) use ($parameters) {
				$query = \Numbers\Users\Users\Model\User\Organizations::queryBuilderStatic(['alias' => 'c'])->select();
				$query->columns(1);
				$query->where('OR', ['c.um_usrorg_organization_id', '=', $parameters['selected_organizations']]);
				$query->where('OR', ['a.um_user_id', '=', 'c.um_usrorg_user_id', true]);
			}, 'EXISTS');
		}
		// um_user_inserted_timestamp
//		if (!empty($parameters['filter_by_location_assignment'])) {
//			$this->query->where('AND', function (& $query) use ($parameters) {
//				$query = \Numbers\Users\Users\Model\User\Assignment\Location\Map::queryBuilderStatic(['alias' => 'inner_a'])->select();
//				$query->columns(1);
//				$query->where('AND', ['inner_a.um_usrasslcnmap_service_id', '=', $parameters['service_id']]);
//				$query->where('AND', ['inner_a.um_usrasslcnmap_location_id', '=', 'a.on_location_id', true]);
//				if (!empty($parameters['country_code'])) {
//					$query->where('AND', ['inner_a.um_usrasslcnmap_country_code', '=', $parameters['country_code']]);
//				}
//				if (!empty($parameters['province_code'])) {
//					$query->where('AND', ['inner_a.um_usrasslcnmap_province_code', '=', $parameters['province_code']]);
//				}
//			}, 'EXISTS');
//		}
//		// filter by territory postal code
//		if (!empty($parameters['filter_by_territory_postal_code'])) {
//			$this->query->where('AND', function (& $query) use ($parameters) {
//				$query = \Numbers\Users\Users\Model\User\Assignment\Territory\PostalCode\Details::queryBuilderStatic(['alias' => 'inner_b'])->select();
//				$query->columns(1);
//				$query->where('AND', ['inner_b.um_usrassdetailterri_service_id', '=', $parameters['service_id']]);
//				$query->where('AND', ['inner_b.um_usrassdetailterri_location_id', '=', 'a.on_location_id', true]);
//				$query->where('AND', ['inner_b.um_usrassdetailterri_postal_code', '=', $parameters['postal_code']]);
//			}, 'EXISTS');
//		}
//		// filter by direct postal code
//		if (!empty($parameters['filter_by_direct_postal_code'])) {
//			$this->query->where('AND', function (& $query) use ($parameters) {
//				$query = \Numbers\Users\Users\Model\User\Assignment\PostalCode\Details::queryBuilderStatic(['alias' => 'inner_c'])->select();
//				$query->columns(1);
//				$query->where('AND', ['inner_c.um_usrassdetailpostal_service_id', '=', $parameters['service_id']]);
//				$query->where('AND', ['inner_c.um_usrassdetailpostal_location_id', '=', 'a.on_location_id', true]);
//				$query->where('AND', ['inner_c.um_usrassdetailpostal_postal_code', '=', $parameters['postal_code']]);
//			}, 'EXISTS');
//		}
//		// filter by country
//		if (!empty($parameters['filter_by_territory_county'])) {
//			$this->query->where('AND', function (& $query) use ($parameters) {
//				$query = \Numbers\Users\Users\Model\User\Assignment\Territory\County\Details::queryBuilderStatic(['alias' => 'inner_d'])->select();
//				$query->columns(1);
//				$query->where('AND', ['inner_d.um_usrassdetailcounty_service_id', '=', $parameters['service_id']]);
//				$query->where('AND', ['inner_d.um_usrassdetailcounty_location_id', '=', 'a.on_location_id', true]);
//				$query->where('AND', ['inner_d.um_usrassdetailcounty_territory_id', '=', $parameters['territory_id']]);
//			}, 'EXISTS');
//		}
//		// geo assignment
		if (!empty($parameters['filter_by_geo_assignment'])) {
			if (!empty($parameters['postal_code']) && !empty($parameters['address'])) {
				$decoded = \Numbers\Countries\Countries\Helper\Google::decodeAnAddress($parameters['address']);
				if (!$decoded['success']) { // query postal codes
					$decoded = \Numbers\Countries\Countries\Helper\PostalCode::decodePostalCode($parameters['country_code'], $parameters['postal_code']);
				}
				if ($decoded['success']) {
					$this->query->where('AND', function (& $query) use ($parameters, $decoded) {
						$query = \Numbers\Users\Users\Model\User\Assignment\GeoAreas::queryBuilderStatic(['alias' => 'inner_e'])->select();
						$query->columns(1);
						$query->where('AND', ['inner_e.um_usrassgeoarea_service_id', '=', $parameters['service_id']]);
						$query->where('AND', ['inner_e.um_usrassgeoarea_location_id', '=', $parameters['location_id']]);
						$query->where('AND', ['inner_e.um_usrassgeoarea_user_id', '=', 'a.um_user_id', true]);
						$temp_contains = $this->query->db_object->sqlHelper('ST_Contains', [
							'from' => 'inner_e.um_usrassgeoarea_polygon',
							'to' => $this->query->db_object->sqlHelper('ST_Point', [
								'latitude' => $decoded['latitude'],
								'longitude' => $decoded['longitude'],
							]),
						]);
						$query->where('AND', $temp_contains);
					}, 'EXISTS');
				} else {
					$this->query->where('AND', 'FALSE');
				}
			} else {
				$this->query->where('AND', 'FALSE');
			}
		}
		// where
		$this->query->where('AND', ['a.um_user_inactive', '=', 0]);
		// limit
		$this->query->limit($parameters['limit']);
		// order
		$this->query->orderby(['last_timestamp' => SORT_ASC]);
		// debug
		//print_r2($this->query->sql());
	}
}