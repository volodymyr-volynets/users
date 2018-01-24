<?php

namespace Numbers\Users\Organizations\Form\Service\Workflow;
class Dashboards extends \Object\Form\Wrapper\Base {
	public $form_link = 'on_workflow_dashboards';
	public $module_code = 'ON';
	public $title = 'O/N Workflow Dashboards Form';
	public $options = [
		'segment' => self::SEGMENT_FORM,
		'actions' => [
			'refresh' => true,
			'new' => true,
			'back' => true,
			'import' => true
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
	];
	public $rows = [
		'top' => [
			'on_workdashboard_id' => ['order' => 100],
			'on_workdashboard_name' => ['order' => 200],
		]
	];
	public $elements = [
		'top' => [
			'on_workdashboard_id' => [
				'on_workdashboard_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Dashboard #', 'domain' => 'dashboard_id_sequence', 'percent' => 50, 'navigation' => true],
				'on_workdashboard_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => true, 'navigation' => true],
				'on_workdashboard_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'on_workdashboard_name' => [
				'on_workdashboard_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			],
			'on_workdashboard_icon' => [
				'on_workdashboard_icon' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Frontend\HTML\FontAwesome\Model\Icons::options', 'searchable' => true],
			],
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Workflow Dashboards',
		'model' => '\Numbers\Users\Organizations\Model\Service\Workflow\Dashboards'
	];

	public function validate(& $form) {

	}
}