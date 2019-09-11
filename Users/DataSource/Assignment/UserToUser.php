<?php

namespace Numbers\Users\Users\DataSource\Assignment;
class UserToUser extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['assignment_id', 'user_id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map = [];
	public $options_active = [];
	public $column_prefix;

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = '\Numbers\Users\Users\Model\User\Assignments';
	public $parameters = [
		'user_id' => ['name' => 'User #', 'domain' => 'user_id', 'required' => true],
	];

	public function query($parameters, $options = []) {
		// columns
		$this->query->columns([
			'assignment_id' => 'a.um_usrassign_assignusrtype_id',
			'assignment_name' => 'c.um_assignusrtype_name',
			'user_id' => 'a.um_usrassign_child_user_id',
			'user_name' => 'b.um_user_name',
			'reverse' => 0,
		]);
		$this->query->join('INNER', new \Numbers\Users\Users\Model\Users(), 'b', 'ON', [
			['AND', ['b.um_user_id', '=', 'a.um_usrassign_child_user_id', true], false]
		]);
		$this->query->join('INNER', new \Numbers\Users\Users\Model\User\Assignment\Types(), 'c', 'ON', [
			['AND', ['c.um_assignusrtype_id', '=', 'a.um_usrassign_assignusrtype_id', true], false]
		]);
		$this->query->where('AND', ['a.um_usrassign_parent_user_id', '=', $parameters['user_id']]);
		$this->query->union('UNION ALL', function(& $query2) use ($parameters) {
			$query2 =  \Numbers\Users\Users\Model\User\Assignments::queryBuilderStatic(['skip_acl' => true, 'alias' => 'inner_c'])->select();
			$query2->columns([
				'assignment_id' => 'inner_c.um_usrassign_assignusrtype_id',
				'assignment_name' => 'inner_c2.um_assignusrtype_name',
				'user_id' => 'inner_c.um_usrassign_parent_user_id',
				'user_name' => 'inner_b.um_user_name',
				'reverse' => 1,
			]);
			$query2->join('INNER', new \Numbers\Users\Users\Model\Users(), 'inner_b', 'ON', [
				['AND', ['inner_b.um_user_id', '=', 'inner_c.um_usrassign_parent_user_id', true], false]
			]);
			$query2->join('INNER', new \Numbers\Users\Users\Model\User\Assignment\Types(), 'inner_c2', 'ON', [
				['AND', ['inner_c2.um_assignusrtype_id', '=', 'inner_c.um_usrassign_assignusrtype_id', true], false]
			]);
			$query2->where('AND', ['inner_c.um_usrassign_child_user_id', '=', $parameters['user_id']]);
		});
	}
}