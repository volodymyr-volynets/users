<?php

namespace Numbers\Users\Organizations\DataSource;
class Holidays extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['on_holiday_id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $column_prefix = 'on_holiday_';

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $options_map = [];
	public $options_active = [];

	public $primary_model = '\Numbers\Users\Organizations\Model\Organization\Holidays';
	public $parameters = [
		'selected_organizations' => ['name' => 'Selected Organizations', 'domain' => 'organization_id', 'multiple_column' => true, 'required' => true],
		'today_is_holiday' => ['name' => 'Is Holiday Today', 'type' => 'boolean'],
	];

	public function query($parameters, $options = []) {
		// columns
		$this->query->columns([
			'on_holiday_id',
			'on_holiday_date',
			'on_holiday_name',
		]);
		// selected organizations
		if (!empty($parameters['selected_organizations'])) {
			$this->query->where('AND', function (& $query) use ($parameters) {
				$query = \Numbers\Users\Organizations\Model\Organization\Holiday\Organizations::queryBuilderStatic(['alias' => 'inner_p'])->select();
				$query->columns(1);
				$query->where('AND', ['inner_p.on_holiorg_holiday_id', '=', 'a.on_holiday_id', true]);
				$query->where('AND', ['inner_p.on_holiorg_organization_id', '=', $parameters['selected_organizations']]);
			}, 'EXISTS');
		}
		if (!empty($parameters['today_is_holiday'])) {
			$this->query->where('AND', ['a.on_holiday_date', '=', \Format::now('date')]);
		}
		$this->query->where('AND', ['a.on_holiday_inactive', '=', 0]);
	}
}