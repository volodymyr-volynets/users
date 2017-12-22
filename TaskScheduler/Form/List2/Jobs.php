<?php

namespace Numbers\Users\TaskScheduler\Form\List2;
class Jobs extends \Object\Form\Wrapper\List2 {
	public $form_link = 'ts_jobs_list';
	public $module_code = 'TS';
	public $title = 'T/S Jobs List';
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
			'full_text_search' => [
				'full_text_search' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Text Search', 'full_text_search_columns' => ['a.ts_job_name'], 'placeholder' => true, 'domain' => 'name', 'percent' => 100, 'null' => true],
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
				'ts_job_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Job #', 'domain' => 'group_id_sequence', 'percent' => 15, 'url_edit' => true],
				'ts_job_name' => ['order' => 2, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 80],
				'ts_job_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'row2' => [
				'blank' => ['order' => 0, 'label_name' => '', 'percent' => 15],
				'ts_job_daemon_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Daemon', 'domain' => 'type_code', 'percent' => 25, 'options_model' => '\Numbers\Users\TaskScheduler\Model\Daemons'],
				'ts_job_task_code' => ['order' => 2, 'label_name' => 'Task', 'domain' => 'group_code', 'percent' => 30, 'options_model' => '\Numbers\Users\TaskScheduler\Model\Tasks'],
				'ts_job_user_id' => ['order' => 3, 'label_name' => 'User', 'domain' => 'user_id', 'percent' => 30, 'options_model' => '\Numbers\Users\Users\Model\Users'],
			]
		]
	];
	public $query_primary_model = '\Numbers\Users\TaskScheduler\Model\Jobs';
	public $list_options = [
		'pagination_top' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'pagination_bottom' => '\Numbers\Frontend\HTML\Form\Renderers\HTML\Pagination\Base',
		'default_limit' => 30,
		'default_sort' => [
			'ts_job_id' => SORT_DESC
		]
	];
	const LIST_SORT_OPTIONS = [
		'ts_job_id' => ['name' => 'Job #'],
		'ts_job_name' => ['name' => 'Name']
	];
}