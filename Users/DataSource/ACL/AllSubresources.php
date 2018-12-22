<?php

namespace Numbers\Users\Users\DataSource\ACL;
class AllSubresources extends \Object\DataSource {
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

	public $primary_model = '\Numbers\Backend\System\Modules\Model\Resource\Subresources';
	public $parameters = [];

	public function query($parameters, $options = []) {
		$this->query->columns([
			'id' => 'a.sm_rsrsubres_id',
			'parent_id' => 'a.sm_rsrsubres_parent_rsrsubres_id',
			'code' => 'a.sm_rsrsubres_code',
			'name' => 'a.sm_rsrsubres_name',
			'icon' => 'a.sm_rsrsubres_icon',
			'module_code' => 'a.sm_rsrsubres_module_code',
			'disabled' => 'a.sm_rsrsubres_disabled',
			'inactive' => 'a.sm_rsrsubres_inactive',
		]);
		// join
		$this->query->join('LEFT', function (& $query) {
			$query = \Numbers\Backend\System\Modules\Model\Resource\Subresource\Features::queryBuilderStatic(['alias' => 'inner_a'])->select();
			$query->columns([
				'rsrsubres_id' => 'inner_a.sm_rsrsubftr_rsrsubres_id',
				'missing_features' => 'SUM(CASE WHEN inner_b.tm_feature_feature_code IS NULL THEN 1 ELSE 0 END)'
			]);
			$query->join('LEFT', new \Numbers\Tenants\Tenants\Model\Module\Features(), 'inner_b', 'ON', [
				['AND', ['inner_b.tm_feature_feature_code', '=', 'inner_a.sm_rsrsubftr_feature_code', true]]
			]);
			$query->where('AND', ['inner_a.sm_rsrsubftr_inactive', '=', 0]);
			$query->groupby(['rsrsubres_id']);
		}, 'c', 'ON', [
			['AND', ['a.sm_rsrsubres_id', '=', 'c.rsrsubres_id', true], false]
		]);
		// where
		$this->query->where('AND', ['c.missing_features', '=', 0]);
		$this->query->where('AND', ['a.sm_rsrsubres_inactive', '=', 0]);
	}
}