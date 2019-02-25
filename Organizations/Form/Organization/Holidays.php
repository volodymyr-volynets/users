<?php

namespace Numbers\Users\Organizations\Form\Organization;
class Holidays extends \Object\Form\Wrapper\Base {
	public $form_link = 'on_holidays';
	public $module_code = 'ON';
	public $title = 'O/N Organization Holidays Form';
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
			'on_holiday_id' => [
				'on_holiday_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Holiday #', 'domain' => 'holiday_id_sequence', 'percent' => 95, 'navigation' => true],
				'on_holiday_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'on_holiday_name' => [
				'on_holiday_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'percent' => 50, 'required' => true],
				'on_holiday_date' => ['order' => 2, 'label_name' => 'Date', 'type' => 'date', 'null' => true, 'percent' => 50, 'required' => true, 'method' => 'calendar', 'calendar_icon' => 'right']
			],
			'on_holiday_organization_id' => [
				'on_holiday_organization_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive', 'options_params' => ['on_organization_subtype_id' => 10]],
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Holidays',
		'model' => '\Numbers\Users\Organizations\Model\Organization\Holidays'
	];
}