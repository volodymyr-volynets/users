<?php

class numbers_users_users_datasource_acl_menu extends object_datasource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['id'];
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
	public $parameters = [];

	public function query($parameters, $options = []) {
		$this->query->columns([
			'id' => 'a.sm_resource_id',
			'type' => 'a.sm_resource_type',
			'name' => 'a.sm_resource_name',
			'description' => 'a.sm_resource_description',
			'icon' => 'a.sm_resource_icon',
			'url' => 'a.sm_resource_menu_url',
			'group1' => 'sm_resource_group1_name',
			'group2' => 'sm_resource_group2_name',
			'group3' => 'sm_resource_group3_name',
			'group4' => 'sm_resource_group4_name',
			'group5' => 'sm_resource_group5_name',
			'group6' => 'sm_resource_group6_name',
			'group7' => 'sm_resource_group7_name',
			'group8' => 'sm_resource_group8_name',
			'group9' => 'sm_resource_group9_name',
			'acl_public' => 'sm_resource_acl_public',
			'acl_authorized' => 'sm_resource_acl_authorized',
			'acl_permission' => 'sm_resource_acl_permission',
		]);
		// join
		/*
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
		*/
		// where
		$this->query->where('AND', ['a.sm_resource_type', '>=', 200]);
		$this->query->where('AND', ['a.sm_resource_type', '<', 300]);
		$this->query->where('AND', ['a.sm_resource_inactive', '=', 0]);
		
		// todo - limit by activated modules/fatures
		// orderby
		$this->query->orderby(['a.sm_resource_type' => SORT_DESC]);
	}
}