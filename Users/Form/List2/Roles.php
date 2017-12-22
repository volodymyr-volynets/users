<?php

namespace Numbers\Users\Users\Form\List2;
class Roles extends \Object\Form\Wrapper\List2 {
	public $form_link = 'um_roles_list';
	public $module_code = 'UM';
	public $title = 'U/M Roles List';
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
			'um_role_id' => [
				'um_role_id1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role #', 'domain' => 'role_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.um_role_id;>='],
				'um_role_id2' => ['order' => 2, 'label_name' => 'Role #', 'domain' => 'role_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.um_role_id;<='],
				'um_role_type_id1' => ['order' => 3, 'label_name' => 'Type', 'domain' => 'type_id', 'percent' => 50, 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Numbers\Users\Users\Model\Role\Types', 'query_builder' => 'a.um_role_type_id'],
			],
			'tm_module_module_code' => [
				'um_role_global1' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Global', 'type' => 'boolean', 'percent' => 33, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Object\Data\Model\Inactive', 'query_builder' => 'a.um_role_global;='],
				'um_role_super_admin1' => ['order' => 2, 'label_name' => 'Super Admin', 'type' => 'boolean', 'percent' => 33, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Object\Data\Model\Inactive', 'query_builder' => 'a.um_role_super_admin;='],
				'um_role_inactive1' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 34, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Object\Data\Model\Inactive', 'query_builder' => 'a.um_role_inactive;=']
			],
			'full_text_search' => [
				'full_text_search' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Text Search', 'full_text_search_columns' => ['a.um_role_code', 'a.um_role_name'], 'placeholder' => true, 'domain' => 'name', 'percent' => 100, 'null' => true],
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
				'um_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role #', 'domain' => 'role_id', 'percent' => 10, 'url_edit' => true],
				'um_role_name' => ['order' => 2, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 45],
				'um_role_code' => ['order' => 3, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 20],
				'um_role_type_id' => ['order' => 4, 'label_name' => 'Type', 'domain' => 'type_id', 'percent' => 10, 'options_model' => '\Numbers\Users\Users\Model\Role\Types'],
				'um_role_global' => ['order' => 5, 'label_name' => 'Global', 'type' => 'boolean', 'percent' => 5],
				'um_role_super_admin' => ['order' => 6, 'label_name' => 'Super Admin', 'type' => 'boolean', 'percent' => 5],
				'um_role_inactive' => ['order' => 7, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		]
	];
	public $query_primary_model = '\Numbers\Users\Users\Model\Roles';
	public $list_options = [
		'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'default_limit' => 30,
		'default_sort' => [
			'um_role_id' => SORT_ASC
		]
	];
	const LIST_SORT_OPTIONS = [
		'um_role_id' => ['name' => 'User #'],
		'um_role_name' => ['name' => 'Name']
	];
}