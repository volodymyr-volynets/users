<?php

namespace Numbers\Users\Widgets\Voters\Form;
class Types extends \Object\Form\Wrapper\Base {
	public $form_link = 'um_voter_types';
	public $module_code = 'UM';
	public $title = 'U/M Voter Types Form';
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
			'um_vtrtype_code' => [
				'um_vtrtype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Code', 'domain' => 'type_code', 'required' => true, 'percent' => 95, 'navigation' => true],
				'um_vtrtype_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'um_vtrtype_name' => [
				'um_vtrtype_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			],
			'um_vtrtype_pass_percent' => [
				'um_vtrtype_ownertype_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Owner Type', 'domain' => 'type_id', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'searchable' => true, 'options_model' => '\Numbers\Users\Users\Model\User\Owner\Types::optionsActive', 'onchange' => 'this.form.submit();'],
				'um_vtrtype_pass_percent' => ['order' => 2, 'label_name' => 'Percent Pass', 'domain' => 'percent', 'percent' => 50, 'required' => true],
			],
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Types',
		'model' => '\Numbers\Users\Widgets\Voters\Model\Types',
	];
}