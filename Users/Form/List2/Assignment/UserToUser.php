<?php

namespace Numbers\Users\Users\Form\List2\Assignment;
class UserToUser extends \Object\Form\Wrapper\List2 {
	public $form_link = 'um_assignment_user_to_user_list';
	public $module_code = 'UM';
	public $title = 'U/M User To User Assignment List';
	public $options = [
		'segment' => self::SEGMENT_LIST,
		'actions' => [
			'refresh' => true,
			'new' => ['onclick' => null],
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
			'um_usrassign_assignusrtype_id' => [
				'um_usrassign_assignusrtype_id1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Assignment', 'domain' => 'assignment_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\User\Assignment\Types', 'query_builder' => 'a.um_usrassign_assignusrtype_id;='],
				'um_assignusrtype_inactive1' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 50, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Object\Data\Model\Inactive', 'query_builder' => 'a.um_assignusrtype_inactive;=']
			],
			'um_usrassign_parent_user_id' => [
				'um_usrassign_parent_user_id1' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Parent User', 'domain' => 'user_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\Users', 'query_builder' => 'a.um_usrassign_parent_user_id;='],
				'um_usrassign_child_user_id1' => ['order' => 2, 'label_name' => 'Child User', 'domain' => 'user_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\Users', 'query_builder' => 'a.um_usrassign_child_user_id;='],
			],
			'um_usrassign_parent_role_id' => [
				'um_usrassign_parent_role_id1' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Parent Role', 'domain' => 'role_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\Roles', 'query_builder' => 'a.um_usrassign_parent_role_id;='],
				'um_usrassign_child_role_id1' => ['order' => 2, 'label_name' => 'Child Role', 'domain' => 'role_id', 'null' => true, 'percent' => 50, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\Roles', 'query_builder' => 'a.um_usrassign_child_role_id;='],
			],
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
				'um_usrassign_assignusrtype_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Assignment', 'domain' => 'assignment_id', 'percent' => 95, 'url_edit' => true, 'options_model' => '\Numbers\Users\Users\Model\User\Assignment\Types'],
				'um_usrassign_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'row2' => [
				'um_usrassign_parent_user_id' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Parent User', 'domain' => 'user_id', 'percent' => 50, 'options_model' => '\Numbers\Users\Users\Model\Users'],
				'um_usrassign_child_user_id' => ['order' => 2, 'label_name' => 'Child User', 'domain' => 'user_id', 'percent' => 50, 'options_model' => '\Numbers\Users\Users\Model\Users'],
			],
			'row3' => [
				'um_usrassign_parent_role_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Parent Role', 'domain' => 'role_id', 'percent' => 50, 'options_model' => '\Numbers\Users\Users\Model\Roles'],
				'um_usrassign_child_role_id' => ['order' => 2, 'label_name' => 'Child Role', 'domain' => 'role_id', 'percent' => 50, 'options_model' => '\Numbers\Users\Users\Model\Roles'],
			],
		]
	];
	public $query_primary_model = '\Numbers\Users\Users\Model\User\Assignments';
	public $list_options = [
		'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'default_limit' => 30,
		'default_sort' => [
			'um_usrassign_parent_user_id' => SORT_ASC,
			'um_usrassign_child_user_id' => SORT_ASC,
		]
	];
	const LIST_SORT_OPTIONS = [
		'um_usrassign_parent_user_id' => ['name' => 'Parent User #'],
		'um_usrassign_child_user_id' => ['name' => 'Child User #'],
	];
}