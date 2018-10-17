<?php

namespace Numbers\Users\Users\DataSource\ACL;
class Subresources extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['module_id', 'id'];
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

	public $primary_model;
	public $parameters = [
		'resource_id' => ['name' => 'Resource #', 'domain' => 'resource_id', 'required' => true],
		'resource_module_id' => ['name' => 'Resource Module #', 'domain' => 'module_id', 'required' => true],
	];

	public function query($parameters, $options = []) {
		$this->query->from(new \Numbers\Tenants\Tenants\DataSource\Module\Linked(), 'a');
		$this->query->columns([
			'module_id' => 'a.tm_modlinked_child_module_id',
			'id' => 'b.sm_rsrsubres_id',
			'parent_id' => 'b.sm_rsrsubres_parent_rsrsubres_id',
			'code' => 'b.sm_rsrsubres_code',
			'name' => 'b.sm_rsrsubres_name',
			'icon' => 'b.sm_rsrsubres_icon',
			'module_code' => 'b.sm_rsrsubres_module_code',
			'inactive' => 'b.sm_rsrsubres_inactive + a.tm_modlinked_inactive',
		]);
		// join
		$this->query->join('INNER', new \Numbers\Backend\System\Modules\Model\Resource\Subresources(), 'b', 'ON', [
			['AND', ['b.sm_rsrsubres_resource_id', '=', $parameters['resource_id'], false], false],
			['AND', ['b.sm_rsrsubres_module_code', '=', 'a.tm_modlinked_child_module_code', true], false]
		]);
		$this->query->join('LEFT', function (& $query) use ($parameters) {
			$query = \Numbers\Backend\System\Modules\Model\Resource\Subresource\Features::queryBuilderStatic(['alias' => 'inner_a'])->select();
			$query->columns([
				'module_id' => 'inner_b.tm_feature_module_id',
				'rsrsubres_id' => 'inner_a.sm_rsrsubftr_rsrsubres_id',
				'missing_features' => 'SUM(CASE WHEN inner_b.tm_feature_feature_code IS NULL THEN 1 ELSE 0 END)'
			]);
			$query->join('LEFT', new \Numbers\Tenants\Tenants\Model\Module\Features(), 'inner_b', 'ON', [
				['AND', ['inner_b.tm_feature_feature_code', '=', 'inner_a.sm_rsrsubftr_feature_code', true]]
			]);
			$query->where('AND', ['inner_a.sm_rsrsubftr_inactive', '=', 0]);
			$query->groupby(['module_id', 'rsrsubres_id']);
		}, 'c', 'ON', [
			['AND', ['c.module_id', '=', 'a.tm_modlinked_child_module_id', true], false],
			['AND', ['b.sm_rsrsubres_id', '=', 'c.rsrsubres_id', true], false]
		]);
		// where
		$this->query->where('AND', ['a.tm_modlinked_parent_module_id', '=', $parameters['resource_module_id']]);
		$this->query->where('AND', ['c.missing_features', '=', 0]);
	}

	/**
	 * @see $this->options();
	 */
	public function optionsJson(array $options = []) : array {
		if (!is_array($options['existing_values'])) {
			$options['existing_values'] = [$options['existing_values']];
		}
		$data = $this->get($options);
		$result = [];
		foreach ($data as $k => $v) {
			foreach ($v as $k2 => $v2) {
				$key = \Object\Table\Options::optionJsonFormatKey(['module_id' => $k, 'rsrsubres_id' => $k2]);
				// hide inactive
				if ($v2['inactive'] && !in_array($key, $options['existing_values'])) continue;
				$parent = $v2['parent_id'] ? \Object\Table\Options::optionJsonFormatKey(['module_id' => $k, 'rsrsubres_id' => $v2['parent_id']]) : null;
				// add item
				$result[$key] = [
					'name' => $v2['name'],
					'icon_class' => \HTML::icon(['type' => $v2['icon'] ?? 'fas fa-cubes', 'class_only' => true]),
					'parent' => $parent,
					'inactive' => $v2['inactive'],
				];
			}
		}
		if (!empty($result)) {
			$converted = \Helper\Tree::convertByParent($result, 'parent');
			$result = [];
			\Helper\Tree::convertTreeToOptionsMulti($converted, 0, ['name_field' => 'name'], $result);
		}
		return $result;
	}
}