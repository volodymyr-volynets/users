<?php

namespace Numbers\Users\TimeTracking\Form;
class Projects extends \Object\Form\Wrapper\Base {
	public $form_link = 'tt_projects';
	public $module_code = 'TT';
	public $title = 'T/T Projects Form';
	public $options = [
		'segment' => self::SEGMENT_FORM,
		'actions' => [
			'refresh' => true,
			'back' => true,
			'new' => true,
			'import' => true
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900]
	];
	public $rows = [];
	public $elements = [
		'top' => [
			'tt_project_id' => [
				'tt_project_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Project #', 'domain' => 'project_id_sequence', 'percent' => 95, 'navigation' => ['depends' => 'tt_project_user_id']],
				'tt_project_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'tt_project_name' => [
				'tt_project_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			],
			'tt_project_organization_id' => [
				'tt_project_organization_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsActive'],
				'tt_project_date_start' => ['order' => 2, 'label_name' => 'Date Start', 'type' => 'date', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
				'tt_project_date_finish' => ['order' => 3, 'label_name' => 'Date Finish', 'type' => 'date', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		],
		self::HIDDEN => [
			'tt_project_user_id' => [
				'tt_project_user_id' => ['order_for_defaults' => PHP_INT_MIN, 'label_name' => 'User #', 'domain' => 'user_id', 'method' => 'hidden'],
			]
		],
	];
	public $collection = [
		'name' => 'Projects',
		'model' => '\Numbers\Users\TimeTracking\Model\Projects',
		'acl_datasource' => '\Numbers\Users\TimeTracking\DataSource\Projects',
		'acl_parameters' => [],
	];
}