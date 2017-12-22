<?php

namespace Numbers\Users\Advertising\Form;
class AdCodes extends \Object\Form\Wrapper\Base {
	public $form_link = 'am_adcodes';
	public $module_code = 'AM';
	public $title = 'A/M Ad Codes Form';
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
			'am_adcode_id' => [
				'am_adcode_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Ad Code #', 'domain' => 'group_id_sequence', 'percent' => 50, 'navigation' => true],
				'am_adcode_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 45, 'required' => true, 'navigation' => true],
				'am_adcode_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'am_adcode_name' => [
				'am_adcode_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			],
			'am_adcode_category_id' => [
				'am_adcode_category_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Category', 'domain' => 'group_id', 'null' => true, 'percent' => 50, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Advertising\Model\Categories::optionsActive'],
				'am_adcode_organization_id' => ['order' => 2, 'label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'percent' => 50, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\DataSource\Organizations::optionsActive'],
			],
			'am_adcode_effective_from' => [
				'am_adcode_effective_from' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Effective From', 'type' => 'date', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
				'am_adcode_effective_to' => ['order' => 2, 'label_name' => 'Effective To', 'type' => 'date', 'null' => true, 'percent' => 25, 'method' => 'calendar', 'calendar_icon' => 'right'],
				'am_adcode_hidden' => ['order' => 3, 'label_name' => 'Hidden', 'type' => 'boolean', 'percent' => 50],
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Categories',
		'model' => '\Numbers\Users\Advertising\Model\AdCodes'
	];
}