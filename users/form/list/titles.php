<?php

class numbers_users_users_form_list_titles extends object_form_wrapper_list {
	public $form_link = 'titles_list';
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
			'um_usrgrp_id' => [
				'um_usrtitle_order1' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Order #', 'domain' => 'order', 'percent' => 50, 'null' => true, 'query_builder' => 'a.um_usrtitle_order'],
				'um_usrtitle_inactive1' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 50, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => 'object_data_model_inactive', 'query_builder' => 'a.um_usrtitle_inactive;=']
			],
			'full_text_search' => [
				'full_text_search' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Text Search', 'full_text_search_columns' => ['a.um_usrtitle_name'], 'placeholder' => true, 'domain' => 'name', 'percent' => 100, 'null' => true],
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
				'um_usrtitle_name' => ['order' => 1, 'label_name' => 'Name', 'domain' => 'personal_title', 'percent' => 65, 'url_edit' => true],
				'um_usrtitle_order' => ['order' => 2, 'label_name' => 'Order', 'domain' => 'order', 'percent' => 30],
				'um_usrtitle_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		]
	];
	public $query_primary_model = 'numbers_users_users_model_user_titles';
	public $list_options = [
		'pagination_top' => 'numbers_frontend_html_form_renderers_html_pagination_base',
		'pagination_bottom' => 'numbers_frontend_html_form_renderers_html_pagination_base',
		'default_limit' => 30,
		'default_sort' => [
			'um_usrtitle_order' => SORT_ASC
		]
	];
	const list_sort_options = [
		'um_usrtitle_order' => ['name' => 'Order'],
		'um_usrtitle_name' => ['name' => 'Name']
	];

	public function list_query(& $form) {
		
	}
}