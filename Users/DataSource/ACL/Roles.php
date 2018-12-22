<?php

namespace Numbers\Users\Users\DataSource\ACL;
class Roles extends \Object\DataSource {
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
	public $cache_memory = true;

	public $primary_model = '\Numbers\Users\Users\Model\Roles';
	public $primary_params = ['skip_acl' => true];
	public $parameters = [];

	public function query($parameters, $options = []) {
		$this->query->columns([
			'id' => 'a.um_role_id',
			'code' => 'a.um_role_code',
			'type_id' => 'a.um_role_type_id',
			'name' => 'a.um_role_name',
			'super_admin' => 'a.um_role_super_admin',
			'weight' => 'a.um_role_weight',
			'inactive' => 'a.um_role_inactive',
			'b.parents',
			'c.permissions',
			'j.features',
			'k.subresources'
		]);
		// join
		$this->query->join('LEFT', function (& $query) {
			$query = \Numbers\Users\Users\Model\Role\Children::queryBuilderStatic(['alias' => 'inner_a', 'skip_acl' => true])->select();
			$query->columns([
				'inner_a.um_rolrol_child_role_id',
				'parents' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_b.um_role_code, inner_a.um_rolrol_inactive)", 'delimiter' => ';;'])
			]);
			// join
			$query->join('INNER', new \Numbers\Users\Users\Model\Roles(), 'inner_b', 'ON', [
				['AND', ['inner_a.um_rolrol_parent_role_id', '=', 'inner_b.um_role_id', true], false]
			]);
			$query->groupby(['inner_a.um_rolrol_child_role_id']);
			$query->where('AND', ['inner_b.um_role_inactive', '=', 0]);
		}, 'b', 'ON', [
			['AND', ['a.um_role_id', '=', 'b.um_rolrol_child_role_id', true], false]
		]);
		$this->query->join('LEFT', function (& $query) {
			$query = \Numbers\Users\Users\Model\Role\Permission\Actions::queryBuilderStatic(['alias' => 'inner_a', 'skip_acl' => true])->select();
			$query->columns([
				'inner_a.um_rolperaction_role_id',
				'permissions' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_a.um_rolperaction_resource_id, inner_a.um_rolperaction_method_code, inner_a.um_rolperaction_action_id, (inner_a.um_rolperaction_inactive + inner_b.um_rolperm_inactive), inner_a.um_rolperaction_module_id)", 'delimiter' => ';;'])
			]);
			$query->join('INNER', new \Numbers\Users\Users\Model\Role\Permissions(), 'inner_b', 'ON', [
				['AND', ['inner_a.um_rolperaction_role_id', '=', 'inner_b.um_rolperm_role_id', true], false],
				['AND', ['inner_a.um_rolperaction_module_id', '=', 'inner_b.um_rolperm_module_id', true], false],
				['AND', ['inner_a.um_rolperaction_resource_id', '=', 'inner_b.um_rolperm_resource_id', true], false]
			]);
			$query->groupby(['inner_a.um_rolperaction_role_id']);
		}, 'c', 'ON', [
			['AND', ['a.um_role_id', '=', 'c.um_rolperaction_role_id', true], false]
		]);
		$this->query->join('LEFT', function (& $query) {
			$query = \Numbers\Users\Users\Model\Role\Features::queryBuilderStatic(['alias' => 'inner_j', 'skip_acl' => true])->select();
			$query->columns([
				'inner_j.um_rolfeature_role_id',
				'features' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('~~', inner_j.um_rolfeature_feature_code, inner_j.um_rolfeature_module_id, inner_j.um_rolfeature_inactive)", 'delimiter' => ';;'])
			]);
			$query->groupby(['inner_j.um_rolfeature_role_id']);
		}, 'j', 'ON', [
			['AND', ['a.um_role_id', '=', 'j.um_rolfeature_role_id', true], false]
		]);
		$this->query->join('LEFT', function (& $query) {
			$query = \Numbers\Users\Users\Model\Role\Permission\Subresources::queryBuilderStatic(['alias' => 'inner_k', 'skip_acl' => true])->select();
			// join
			$query->join('INNER', new \Numbers\Users\Users\Model\Role\Permissions(), 'inner_k2', 'ON', [
				['AND', ['inner_k.um_rolsubres_role_id', '=', 'inner_k2.um_rolperm_role_id', true], false],
				['AND', ['inner_k.um_rolsubres_module_id', '=', 'inner_k2.um_rolperm_module_id', true], false],
				['AND', ['inner_k.um_rolsubres_resource_id', '=', 'inner_k2.um_rolperm_resource_id', true], false]
			]);
			$query->columns([
				'inner_k.um_rolsubres_role_id',
				'subresources' => $query->db_object->sqlHelper('string_agg', ['expression' => "concat_ws('::', inner_k.um_rolsubres_resource_id, inner_k.um_rolsubres_rsrsubres_id, inner_k.um_rolsubres_action_id, (inner_k.um_rolsubres_inactive + inner_k2.um_rolperm_inactive), inner_k.um_rolsubres_module_id)", 'delimiter' => ';;'])
			]);
			$query->groupby(['inner_k.um_rolsubres_role_id']);
		}, 'k', 'ON', [
			['AND', ['a.um_role_id', '=', 'k.um_rolsubres_role_id', true], false]
		]);
		// where
		$this->query->where('AND', ['a.um_role_inactive', '=', 0]);
	}

	public function process($data, $options = []) {
		foreach ($data as $k => $v) {
			// parents
			if (!empty($v['parents'])) {
				$data[$k]['parents'] = [];
				$temp = explode(';;', $v['parents']);
				foreach ($temp as $v2) {
					$v2 = explode('::', $v2);
					$data[$k]['parents'][$v2[0]] = (int) $v2[1];
				}
			} else {
				$data[$k]['parents'] = [];
			}
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