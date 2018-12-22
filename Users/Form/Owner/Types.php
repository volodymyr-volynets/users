<?php

namespace Numbers\Users\Users\Form\Owner;
class Types extends \Object\Form\Wrapper\Base {
	public $form_link = 'um_owner_types';
	public $module_code = 'UM';
	public $title = 'U/M Owner Types Form';
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
	public $rows = [];
	public $elements = [
		'top' => [
			'um_ownertype_id' => [
				'um_ownertype_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type #', 'domain' => 'type_id_sequence', 'percent' => 50, 'navigation' => true],
				'um_ownertype_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => true, 'navigation' => true],
				'um_ownertype_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'um_ownertype_name' => [
				'um_ownertype_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 70, 'required' => true],
				'um_ownertype_multiple' => ['order' => 2, 'label_name' => 'Multiple', 'type' => 'boolean', 'percent' => 15],
				'um_ownertype_can_delete' => ['order' => 3, 'label_name' => 'Can Delete', 'type' => 'boolean', 'percent' => 15],
			],
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Owner Types',
		'model' => '\Numbers\Users\Users\Model\User\Owner\Types'
	];
}