<?php

namespace Numbers\Users\Organizations\Form\List2\Common;
class Notes extends \Object\Form\Wrapper\List2 {
	public $form_link = 'on_common_notes_list';
	public $module_code = 'ON';
	public $title = 'U/M Common Notes List';
	public $options = [
		'segment' => self::SEGMENT_LIST,
		'actions' => [
			'refresh' => true,
			'new' => true,
			'filter_sort' => ['value' => 'Filter/Sort', 'sort' => 32000, 'icon' => 'fas fa-filter', 'onclick' => 'Numbers.Form.listFilterSortToggle(this);']
		]
	];
	public $containers = [
		'tabs' => ['default_row_type' => 'grid', 'order' => 1000, 'type' => 'tabs', 'class' => 'numbers_form_filter_sort_container'],
		'filter' => ['default_row_type' => 'grid', 'order' => 1500],
		'sort' => self::LIST_SORT_CONTAINER,
		self::LIST_CONTAINER => ['default_row_type' => 'grid', 'order' => PHP_INT_MAX],
	];
	public $rows = [
		'tabs' => [
			'filter' => ['order' => 100, 'label_name' => 'Filter'],
			'sort' => ['order' => 200, 'label_name' => 'Sort'],
		]
	];
	public $elements = [
		'tabs' => [
			'filter' => [
				'filter' => ['container' => 'filter', 'order' => 100]
			],
			'sort' => [
				'sort' => ['container' => 'sort', 'order' => 100]
			]
		],
		'filter' => [
			'on_comnote_type_code' => [
				'on_comnote_type_code1' => ['order' => 1, 'row_order' => 125, 'label_name' => 'Type', 'domain' => 'type_code', 'null' => true, 'percent' => 50, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Numbers\Users\Organizations\Model\Common\Note\Types', 'query_builder' => 'a.on_comnote_type_code;='],
				'on_comnote_inactive1' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 50, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Object\Data\Model\Inactive', 'query_builder' => 'a.on_comnote_inactive;=']
			],
			'organization_filter' => [
				'organization_filter' => ['order' => 1, 'row_order' => 150, 'label_name' => 'Organizations', 'domain' => 'organization_id', 'percent' => 50, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations'],
				'locations_filter' => ['order' => 2, 'label_name' => 'Locations', 'domain' => 'location_id', 'percent' => 50, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Numbers\Users\Organizations\Model\Locations'],
			],
			'full_text_search' => [
				'full_text_search' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Text Search', 'full_text_search_columns' => ['a.on_comnote_comment'], 'placeholder' => true, 'domain' => 'name', 'percent' => 100, 'null' => true],
			]
		],
		'sort' => [
			'__sort' => [
				'__sort' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Sort', 'domain' => 'code', 'details_unique_select' => true, 'percent' => 50, 'null' => true, 'method' => 'select', 'options' => self::LIST_SORT_OPTIONS, 'onchange' => 'this.form.submit();'],
				'__order' => ['order' => 2, 'label_name' => 'Order', 'type' => 'smallint', 'default' => SORT_ASC, 'percent' => 50, 'null' => true, 'method' => 'select', 'no_choose' => true, 'options_model' => '\Object\Data\Model\Order', 'onchange' => 'this.form.submit();'],
			]
		],
		self::LIST_BUTTONS => self::LIST_BUTTONS_DATA,
		self::LIST_CONTAINER => [
			'row1' => [
				'on_comnote_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Note #', 'domain' => 'group_id', 'percent' => 10, 'url_edit' => true],
				'on_comnote_comment' => ['order' => 2, 'label_name' => 'Comment', 'domain' => 'comment', 'percent' => 85],
				'on_comnote_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5],
			],
			'row2' => [
				'blank' => ['order' => 1, 'row_order' => 200, 'label_name' => '', 'percent' => 10],
				'on_comnote_type_code' => ['order' => 2, 'label_name' => 'Type', 'domain' => 'type_code', 'percent' => 15, 'options_model' => '\Numbers\Users\Organizations\Model\Common\Note\Types'],
				'organizations' => ['order' => 3, 'label_name' => 'Organizations', 'domain' => 'organization_id', 'null' => true, 'percent' => 75, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations'],
			],
			'row3' => [
				'blank' => ['order' => 1, 'row_order' => 300, 'label_name' => '', 'percent' => 10],
				'locations' => ['order' => 2, 'label_name' => 'Locations', 'domain' => 'location_id', 'null' => true, 'percent' => 90, 'options_model' => '\Numbers\Users\Organizations\Model\Locations'],
			]
		]
	];
	public $query_primary_model = '\Numbers\Users\Organizations\Model\Common\Notes';
	public $query_primary_parameters = [];
	public $list_options = [
		'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'default_limit' => 30,
		'default_sort' => [
			'on_comnote_id' => SORT_ASC
		]
	];
	const LIST_SORT_OPTIONS = [
		'on_comnote_id' => ['name' => 'Note #'],
	];

	public function listQuery(& $form) {
		$result = [
			'success' => false,
			'error' => [],
			'total' => 0,
			'rows' => []
		];
		// joins
		$form->query->join('LEFT', function (& $query) {
			$query = \Numbers\Users\Organizations\Model\Common\Note\Locations::queryBuilderStatic(['alias' => 'inner_a'])->select();
			$query->columns([
				'inner_a.on_comnotloc_comnote_id',
				'locations' => $query->db_object->sqlHelper('string_agg', ['expression' => $query->db_object->cast('on_comnotloc_location_id', 'varchar'), 'delimiter' => ';;'])
			]);
			$query->groupby(['inner_a.on_comnotloc_comnote_id']);
		}, 'b', 'ON', [
			['AND', ['a.on_comnote_id', '=', 'b.on_comnotloc_comnote_id', true], false]
		]);
		$form->query->join('LEFT', function (& $query) {
			$query = \Numbers\Users\Organizations\Model\Common\Note\Organizations::queryBuilderStatic(['alias' => 'inner_b'])->select();
			$query->columns([
				'inner_b.on_comnotorg_comnote_id',
				'organizations' => $query->db_object->sqlHelper('string_agg', ['expression' => $query->db_object->cast('on_comnotorg_organization_id', 'varchar'), 'delimiter' => ';;'])
			]);
			$query->groupby(['inner_b.on_comnotorg_comnote_id']);
		}, 'c', 'ON', [
			['AND', ['a.on_comnote_id', '=', 'c.on_comnotorg_comnote_id', true], false]
		]);
		// where
		if (!empty($form->values['locations_filter'])) {
			$locations_filter = $form->values['locations_filter'];
			$form->query->where('AND', function (& $query) use ($locations_filter) {
				$query = \Numbers\Users\Organizations\Model\Common\Note\Locations::queryBuilderStatic(['alias' => 'inner_c'])->select();
				$query->columns(1);
				$query->where('AND', ['a.on_comnote_id', '=', 'inner_c.on_comnotloc_comnote_id', true]);
				$query->where('AND', ['inner_c.on_comnotloc_location_id', '=', $locations_filter, false]);
			}, 'EXISTS');
		}
		if (!empty($form->values['organization_filter'])) {
			$organization_filter = $form->values['organization_filter'];
			$form->query->where('AND', function (& $query) use ($organization_filter) {
				$query = \Numbers\Users\Organizations\Model\Common\Note\Organizations::queryBuilderStatic(['alias' => 'inner_d'])->select();
				$query->columns(1);
				$query->where('AND', ['a.on_comnote_id', '=', 'inner_d.on_comnotorg_comnote_id', true]);
				$query->where('AND', ['inner_d.on_comnotorg_organization_id', '=', $organization_filter, false]);
			}, 'EXISTS');
		}
		// query #1 get counter
		$counter_query = clone $form->query;
		$counter_query->columns(['counter' => 'COUNT(*)'], ['empty_existing' => true]);
		$temp = $counter_query->query();
		if (!$temp['success']) {
			array_merge3($result['error'], $temp['error']);
			return $result;
		}
		$result['total'] = $temp['rows'][0]['counter'];
		// query #2 get rows
		$form->processListQueryOrderBy();
		$form->query->offset($form->values['__offset'] ?? 0);
		$form->query->limit($form->values['__limit']);
		$temp = $form->query->query();
		if (!$temp['success']) {
			array_merge3($result['error'], $temp['error']);
			return $result;
		}
		foreach ($temp['rows'] as $k => $v) {
			if (empty($v['locations'])) {
				$temp['rows'][$k]['locations'] = [];
			} else {
				$temp['rows'][$k]['locations'] = explode(';;', $v['locations']);
			}
			if (empty($v['organizations'])) {
				$temp['rows'][$k]['organizations'] = [];
			} else {
				$temp['rows'][$k]['organizations'] = explode(';;', $v['organizations']);
			}
		}
		$result['rows'] = & $temp['rows'];
		$result['success'] = true;
		return $result;
	}
}