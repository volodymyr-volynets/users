<?php

namespace Numbers\Users\Users\DataSource\User;
class UserToUser extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = [];
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
		'user_id' => ['name' => 'User #', 'domain' => 'user_id', 'required' => true],
	];

	public function query($parameters, $options = []) {
		$user_id = $parameters['user_id'];
		$this->query = \Object\Query\Builder::quick()->withRecursive('temp_user_env_2000', ['id', 'child_id'], function(& $query) use ($user_id) {
			$query = \Numbers\Users\Users\Model\User\Assignments::queryBuilderStatic(['skip_acl' => true, 'alias' => 'inner_a'])->select();
			$query->columns([
				'id' => 'inner_a.um_usrassign_parent_user_id',
				'child_id' => 'inner_a.um_usrassign_child_user_id'
			]);
			$query->where('AND', ['inner_a.um_usrassign_parent_user_id', '=', $user_id]);
			$query->union('UNION ALL', function(& $query2) {
				$query2 = \Numbers\Users\Users\Model\User\Assignments::queryBuilderStatic(['skip_acl' => true, 'alias' => 'inner_b'])->select();
				$query2->columns([
					'id' => 'inner_b.um_usrassign_parent_user_id',
					'child_id' => 'inner_b.um_usrassign_child_user_id'
				]);
				$query2->from('temp_user_env_2000', 'inner_b2');
				$query2->where('AND', ['inner_b.um_usrassign_parent_user_id', '=', 'inner_b2.child_id', true]);
			});
		});
	}

	public function process($data, $options = []) {
		return array_merge([$options['parameters']['user_id']], array_extract_values_by_key($data, 'child_id'));
	}
}