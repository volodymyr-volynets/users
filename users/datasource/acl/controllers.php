<?php

class numbers_users_users_datasource_acl_controllers extends object_datasource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['code'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map =[];
	public $column_prefix;

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = 'numbers_backend_system_modules_model_resources';
	public $parameters = [
		'sm_resource_acl_permission' => ['name' => 'Acl Permission', 'type' => 'boolean'],
	];

	public function query($parameters, $options = []) {
		$this->query->columns([
			'id' => 'a.sm_resource_id',
			'code' => 'a.sm_resource_code',
			'name' => 'a.sm_resource_name',
			'description' => 'a.sm_resource_description',
			'icon' => 'a.sm_resource_icon',
			'module_code' => 'a.sm_resource_module_code',
			'breadcrumbs' => "concat_ws('::', b.sm_module_name, a.sm_resource_group1_name, a.sm_resource_group2_name, sm_resource_group3_name, sm_resource_group4_name, sm_resource_group5_name, sm_resource_group6_name, sm_resource_group7_name, sm_resource_group8_name, sm_resource_group9_name)",
			'actions' => 'c.actions',
			'acl_public' => 'a.sm_resource_acl_public',
			'acl_authorized' => 'a.sm_resource_acl_authorized',
			'acl_permission' => 'a.sm_resource_acl_permission'
		]);
		// join
		$this->query->join('LEFT', new numbers_backend_system_modules_model_modules(), 'b', 'ON', [
			['AND', ['a.sm_resource_module_code', '=', 'b.sm_module_code', true], false]
		]);
		$this->query->join('LEFT', function (& $query) {
			// need to see if modules have not been activated
			$query = numbers_backend_system_modules_model_resource_map::query_builder_static(['alias' => 'inner_a'])->select();
			$query->columns([
				'inner_a.sm_rsrcmp_resource_id',
				'actions' => $query->db_object->sql_helper('string_agg', ['expression' => "concat_ws('::', inner_a.sm_rsrcmp_method_code, inner_a.sm_rsrcmp_action_id, inner_b.sm_action_code)", 'delimiter' => ';;'])
			]);
			// join
			$query->join('INNER', new numbers_backend_system_modules_model_resource_actions(), 'inner_b', 'ON', [
				['AND', ['inner_a.sm_rsrcmp_action_id', '=', 'inner_b.sm_action_id', true], false]
			]);
			$query->groupby(['sm_rsrcmp_resource_id']);
			$query->where('AND', ['inner_a.sm_rsrcmp_inactive', '=', 0]);
			$query->where('AND', ['inner_b.sm_action_inactive', '=', 0]);
		}, 'c', 'ON', [
			['AND', ['a.sm_resource_id', '=', 'c.sm_rsrcmp_resource_id', true], false]
		]);
		// where
		$this->query->where('AND', ['a.sm_resource_type', '=', 100]);
		$this->query->where('AND', ['a.sm_resource_inactive', '=', 0]);
		if (!empty($parameters)) {
			foreach ($parameters as $k => $v) {
				$this->query->where('AND', ["a.{$k}", '=', $v]);
			}
		}
		// todo - limit by activated modules/fatures
	}

	public function process($data, $options = []) {
		foreach ($data as $k => $v) {
			$data[$k]['breadcrumbs'] = explode('::', $v['breadcrumbs']);
			$data[$k]['actions'] = [];
			if (!empty($v['actions'])) {
				$actions = explode(';;', $v['actions']);
				foreach ($actions as $v2) {
					$temp = explode('::', $v2);
					$data[$k]['actions'][$temp[0]][(int) $temp[1]] = $temp[2];
				}
			}
			// unset codes
			unset($data[$k]['code']);
		}
		return $data;
	}
}