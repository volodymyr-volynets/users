<?php

class numbers_users_users_form_list_roles extends object_form_wrapper_list {
	public $form_link = 'roles_list';
	public $options = [
		'segment' => self::segment_list,
		'actions' => [
			'refresh' => true,
			'new' => true,
			'filter_sort' => ['value' => 'Filter/Sort', 'sort' => 32000, 'icon' => 'filter', 'onclick' => 'numbers.form.list_filter_sort_toggle(this);']
		]
	];
	public $containers = [
		'tabs' => ['default_row_type' => 'grid', 'order' => 1000, 'type' => 'tabs', 'class' => 'numbers_form_filter_sort_container'],
		'filter' => ['default_row_type' => 'grid', 'order' => 1500],
		'sort' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 3,
			'details_key' => 'numbers_framework_object_form_model_dummy_sort',
			'details_pk' => ['__sort'],
			'order' => 1600
		],
		self::list_container => ['default_row_type' => 'grid', 'order' => PHP_INT_MAX],
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
				'um_role_id1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role #', 'domain' => 'group_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.um_role_id;>='],
				'um_role_id2' => ['order' => 2, 'label_name' => 'Role #', 'domain' => 'group_id', 'percent' => 25, 'null' => true, 'query_builder' => 'a.um_role_id;<='],
				'um_role_type_id1' => ['order' => 3, 'label_name' => 'Type', 'domain' => 'type_id', 'percent' => 50, 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => 'numbers_users_users_model_role_types', 'query_builder' => 'a.um_role_type_id'],
			],
			'tm_module_module_code' => [
				'um_role_global1' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Global', 'type' => 'boolean', 'percent' => 33, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => 'object_data_model_inactive', 'query_builder' => 'a.um_role_global;='],
				'um_role_super_admin1' => ['order' => 2, 'label_name' => 'Super Admin', 'type' => 'boolean', 'percent' => 33, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => 'object_data_model_inactive', 'query_builder' => 'a.um_role_super_admin;='],
				'um_role_inactive1' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 34, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => 'object_data_model_inactive', 'query_builder' => 'a.um_role_inactive;=']
			],
			'full_text_search' => [
				'full_text_search' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Text Search', 'full_text_search_columns' => ['a.um_role_code', 'a.um_role_name'], 'placeholder' => true, 'domain' => 'name', 'percent' => 100, 'null' => true],
			]
		],
		'sort' => [
			'__sort' => [
				'__sort' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Sort', 'domain' => 'code', 'details_unique_select' => true, 'percent' => 50, 'null' => true, 'method' => 'select', 'options' => self::list_sort_options, 'onchange' => 'this.form.submit();'],
				'__order' => ['order' => 2, 'label_name' => 'Order', 'type' => 'smallint', 'default' => SORT_ASC, 'percent' => 50, 'null' => true, 'method' => 'select', 'no_choose' => true, 'options_model' => 'object_data_model_order', 'onchange' => 'this.form.submit();'],
			]
		],
		self::list_buttons => self::list_buttons_data,
		self::list_container => [
			'row1' => [
				'um_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role #', 'domain' => 'group_id', 'percent' => 10, 'url_edit' => true],
				'um_role_name' => ['order' => 2, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 45],
				'um_role_code' => ['order' => 3, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 20],
				'um_role_type_id' => ['order' => 4, 'label_name' => 'Type', 'domain' => 'type_id', 'percent' => 10, 'options_model' => 'numbers_users_users_model_role_types'],
				'um_role_global' => ['order' => 5, 'label_name' => 'Global', 'type' => 'boolean', 'percent' => 5],
				'um_role_super_admin' => ['order' => 6, 'label_name' => 'Super Admin', 'type' => 'boolean', 'percent' => 5],
				'um_role_inactive' => ['order' => 7, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		]
	];
	public $query_primary_model = 'numbers_users_users_model_roles';
	public $list_options = [
		'pagination_top' => 'numbers_frontend_html_form_renderers_html_pagination_base',
		'pagination_bottom' => 'numbers_frontend_html_form_renderers_html_pagination_base',
		'default_limit' => 30,
		'default_sort' => [
			'um_role_id' => SORT_ASC
		]
	];
	const list_sort_options = [
		'um_role_id' => ['name' => 'User #'],
		'um_role_name' => ['name' => 'Name']
	];

	public function list_query(& $form) {
		
	}
}