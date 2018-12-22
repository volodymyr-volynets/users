<?php

namespace Numbers\Users\Users\DataSource\ACL;
class Teams extends \Object\DataSource {
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
	public $cache_memory = true;

	public $primary_model = '\Numbers\Users\Users\Model\Teams';
	public $parameters = [];

	public function query($parameters, $options = []) {
		$this->query->columns([
			'id' => 'a.um_team_id',
			'name' => 'a.um_team_name',
			'weight' => 'a.um_team_weight',
			'inactive' => 'a.um_team_inactive',
			'c.permissions',
			'j.features',
			'k.subresources'
		]);
		// join
		$this->query->join('LEFT', function (& $query) {
			$query = \Numbers\Users\Users\Model\Team\Permission\Actions::queryBuilderStatic(['alias' => 'inner_a', 'skip_acl' => true])->select();
			$query->columns([
				'inner_a.um_temperaction_team_id',
				'permissions' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_a.um_temperaction_resource_id, inner_a.um_temperaction_method_code, inner_a.um_temperaction_action_id, (inner_a.um_temperaction_inactive + inner_b.um_temperm_inactive), inner_a.um_temperaction_module_id)", 'delimiter' => ';;'])
			]);
			$query->join('INNER', new \Numbers\Users\Users\Model\Team\Permissions(), 'inner_b', 'ON', [
				['AND', ['inner_a.um_temperaction_team_id', '=', 'inner_b.um_temperm_team_id', true], false],
				['AND', ['inner_a.um_temperaction_module_id', '=', 'inner_b.um_temperm_module_id', true], false],
				['AND', ['inner_a.um_temperaction_resource_id', '=', 'inner_b.um_temperm_resource_id', true], false]
			]);
			$query->groupby(['inner_a.um_temperaction_team_id']);
		}, 'c', 'ON', [
			['AND', ['a.um_team_id', '=', 'c.um_temperaction_team_id', true], false]
		]);
		$this->query->join('LEFT', function (& $query) {
			$query = \Numbers\Users\Users\Model\Team\Features::queryBuilderStatic(['alias' => 'inner_j', 'skip_acl' => true])->select();
			$query->columns([
				'inner_j.um_temfeature_team_id',
				'features' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('~~', inner_j.um_temfeature_feature_code, inner_j.um_temfeature_module_id, inner_j.um_temfeature_inactive)", 'delimiter' => ';;'])
			]);
			$query->groupby(['inner_j.um_temfeature_team_id']);
		}, 'j', 'ON', [
			['AND', ['a.um_team_id', '=', 'j.um_temfeature_team_id', true], false]
		]);
		$this->query->join('LEFT', function (& $query) {
			$query = \Numbers\Users\Users\Model\Team\Permission\Subresources::queryBuilderStatic(['alias' => 'inner_k', 'skip_acl' => true])->select();
			// join
			$query->join('INNER', new \Numbers\Users\Users\Model\Team\Permissions(), 'inner_k2', 'ON', [
				['AND', ['inner_k.um_temsubres_team_id', '=', 'inner_k2.um_temperm_team_id', true], false],
				['AND', ['inner_k.um_temsubres_module_id', '=', 'inner_k2.um_temperm_module_id', true], false],
				['AND', ['inner_k.um_temsubres_resource_id', '=', 'inner_k2.um_temperm_resource_id', true], false]
			]);
			$query->columns([
				'inner_k.um_temsubres_team_id',
				'subresources' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_k.um_temsubres_resource_id, inner_k.um_temsubres_rsrsubres_id, inner_k.um_temsubres_action_id, (inner_k.um_temsubres_inactive + inner_k2.um_temperm_inactive), inner_k.um_temsubres_module_id)", 'delimiter' => ';;'])
			]);
			$query->groupby(['inner_k.um_temsubres_team_id']);
		}, 'k', 'ON', [
			['AND', ['a.um_team_id', '=', 'k.um_temsubres_team_id', true], false]
		]);
		// where
		$this->query->where('AND', ['a.um_team_inactive', '=', 0]);
	}

	public function process($data, $options = []) {
		foreach ($data as $k => $v) {
			// permissions
			if (!empty($v['permissions'])) {
				$data[$k]['permissions'] = [];
				$temp = explode(';;', $v['permissions']);
				foreach ($temp as $v2) {
					$v2 = explode('::', $v2);
					$data[$k]['permissions'][(int) $v2[0]][$v2[1]][(int )$v2[2]][(int) $v2[4]] = (int) $v2[3];
				}
			} else {
				$data[$k]['permissions'] = [];
			}
			// features
			if (!empty($v['features'])) {
				$data[$k]['features'] = [];
				$temp = explode(';;', $v['features']);
				foreach ($temp as $v2) {
					$v2 = explode('~~', $v2);
					$data[$k]['features'][$v2[0]][(int) $v2[1]] = (int) $v2[2];
				}
			} else {
				$data[$k]['features'] = [];
			}
			// subresources
			if (!empty($v['subresources'])) {
				$data[$k]['subresources'] = [];
				$temp = explode(';;', $v['subresources']);
				foreach ($temp as $v2) {
					$v2 = explode('::', $v2);
					$data[$k]['subresources'][(int) $v2[0]][(int) $v2[1]][(int )$v2[2]][(int) $v2[4]] = (int) $v2[3];
				}
			} else {
				$data[$k]['subresources'] = [];
			}
		}
		return $data;
	}
}