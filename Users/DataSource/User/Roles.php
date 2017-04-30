<?php

namespace Numbers\Users\Users\DataSource\User;
class Roles extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['um_role_id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map =[
		'um_role_name' => 'name',
		'um_role_icon' => 'icon_class'
	];
	public $options_active =[
		'um_role_inactive' => 0
	];
	public $column_prefix;

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = true;

	public $primary_model;
	public $parameters = [
		'selected_organizations' => ['name' => 'Selected Organizations', 'domain' => 'organization_id', 'multiple_column' => true],
		'existing_values' => ['name' => 'Existing Values', 'type' => 'mixed']
	];

	public function query($parameters, $options = []) {
		$this->query = \Numbers\Users\Users\Model\Roles::queryBuilderStatic([
			'alias' => 'a',
			'existing_values' => $parameters['existing_values'] ?? null
		])->select();
		// where
		$this->query->where('AND', function (& $query) use ($parameters) {
			if (!empty($parameters['existing_values'])) {
				$query->where('OR', ['a.um_role_id', '=', $parameters['existing_values']]);
			}
			if (!empty($parameters['selected_organizations'])) {
				$query->where('OR', function (& $query) use ($parameters) {
					$query = \Numbers\Users\Users\Model\Role\Organizations::queryBuilderStatic(['alias' => 'inner_a'])->select();
					$query->columns(1);
					$query->where('AND', ['inner_a.um_rolorg_role_id', '=', 'a.um_role_id', true]);
					$query->where('AND', ['inner_a.um_rolorg_structure_code', '=', 'BELONGS_TO', false]);
					$query->where('AND', ['inner_a.um_rolorg_organization_id', 'IN', $parameters['selected_organizations'], false]);
				}, true);
			} else {
				$query->where('OR', 'FALSE');
			}
		});
	}
}