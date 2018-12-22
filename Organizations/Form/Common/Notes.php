<?php

namespace Numbers\Users\Organizations\Form\Common;
class Notes extends \Object\Form\Wrapper\Base {
	public $form_link = 'on_common_notes';
	public $module_code = 'ON';
	public $title = 'O/N Common Notes Form';
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
			'on_region_id' => ['order' => 100],
			'on_region_name' => ['order' => 200],
		]
	];
	public $elements = [
		'top' => [
			'on_comnote_id' => [
				'on_comnote_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Note #', 'domain' => 'group_id_sequence', 'percent' => 95, 'navigation' => true],
				'on_comnote_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'on_comnote_type_code' => [
				'on_comnote_type_code' => ['order' => 1, 'row_order' => 150, 'label_name' => 'Type', 'domain' => 'type_code', 'null' => true, 'required' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Common\Note\Types'],
			],
			'organizations' => [
				'\Numbers\Users\Organizations\Model\Common\Note\Organizations' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Organizations', 'domain' => 'organization_id', 'null' => true, 'required' => true, 'multiple_column' => 'on_comnotorg_organization_id', 'percent' => 100, 'method' => 'multiselect', 'options_model' => '\Numbers\Users\Organizations\Model\Organizations', 'onchange' => 'this.form.submit();'],
			],
			'locations' => [
				'\Numbers\Users\Organizations\Model\Common\Note\Locations' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Locations', 'domain' => 'location_id', 'null' => true, 'multiple_column' => 'on_comnotloc_location_id', 'percent' => 100, 'method' => 'multiselect', 'options_model' => '\Numbers\Users\Organizations\Model\Locations'],
			],
			'on_comnote_comment' => [
				'on_comnote_comment' => ['order' => 1, 'row_order' => 400, 'label_name' => 'Comment', 'domain' => 'comment', 'required' => true, 'method' => 'textarea', 'rows' => 10],
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Notes',
		'model' => '\Numbers\Users\Organizations\Model\Common\Notes',
		'details' => [
			'\Numbers\Users\Organizations\Model\Common\Note\Organizations' => [
				'name' => 'Organizations',
				'pk' => ['on_comnotorg_tenant_id', 'on_comnotorg_comnote_id', 'on_comnotorg_organization_id'],
				'type' => '1M',
				'map' => ['on_comnote_tenant_id' => 'on_comnotorg_tenant_id', 'on_comnote_id' => 'on_comnotorg_comnote_id']
			],
			'\Numbers\Users\Organizations\Model\Common\Note\Locations' => [
				'name' => 'Locations',
				'pk' => ['on_comnotloc_tenant_id', 'on_comnotloc_comnote_id', 'on_comnotloc_location_id'],
				'type' => '1M',
				'map' => ['on_comnote_tenant_id' => 'on_comnotloc_tenant_id', 'on_comnote_id' => 'on_comnotloc_comnote_id']
			],
		]
	];
}