<?php

namespace Numbers\Users\Users\DataSource;
class Teams extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['um_team_id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map =[
		'um_team_name' => 'name',
		'um_team_icon' => 'icon_class',
		'um_team_inactive' => 'inactive'
	];
	public $options_active =[
		'um_team_inactive' => 0
	];
	public $column_prefix = 'um_team_';

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = true;

	public $primary_model = '\Numbers\Users\Users\Model\Teams';
	public $parameters = [
		'selected_organizations' => ['name' => 'Selected Organizations', 'domain' => 'organization_id', 'multiple_column' => true],
		'existing_values' => ['name' => 'Existing Values', 'type' => 'mixed'],
		'organizations_for_current_user' => ['name' => 'Organizations For Current User', 'type' => 'boolean'],
		'skip_acl' => ['name' => 'Skip Acl', 'type' => 'boolean']
	];

	public function query($parameters, $options = []) {
		// Organizations For Current User
		if (!empty($parameters['organizations_for_current_user'])) {
			$parameters['selected_organizations'] = \User::get('organizations');
		}
		// columns
		$this->query->columns(['a.*']);
		// selected organizations
		$this->query->where('AND', function (& $query) use ($parameters) {
			if (!empty($parameters['existing_values'])) {
				$query->where('OR', ['a.um_team_id', '=', $parameters['existing_values']]);
			}
			if (!empty($parameters['selected_organizations'])) {
				$query->where('OR', function (& $query) use ($parameters) {
					$query = \Numbers\Users\Users\Model\Team\Organizations::queryBuilderStatic(['alias' => 'inner_a'])->select();
					$query->columns(1);
					$query->where('AND', ['inner_a.um_temorg_team_id', '=', 'a.um_team_id', true]);
					$query->where('AND', ['inner_a.um_temorg_organization_id', 'IN', $parameters['selected_organizations'], false]);
				}, true);
			} else {
				$query->where('OR', function (& $query) use ($parameters) {
					$query = \Numbers\Users\Users\Model\Team\Organizations::queryBuilderStatic(['alias' => 'inner_a'])->select();
					$query->columns(1);
					$query->where('AND', ['inner_a.um_temorg_team_id', '=', 'a.um_team_id', true]);
					$query->where('AND', ['inner_a.um_temorg_organization_id', 'IS NOT', null, false]);
				}, true);
			}
		});
	}

	public function processNotCached($data, $options = []) {
		if (!\User::get('super_admin') && empty($options['parameters']['skip_acl'])) {
			foreach ($data as $k => $v) {
				// filter
				if (!\Object\Table\Options::processOptionsExistingValuesAndSkipValues($v['um_team_id'], $options['existing_values'] ?? null, $options['skip_values'] ?? null)) {
					unset($data[$k]);
					continue;
				}
			}
		}
		return $data;
	}
}