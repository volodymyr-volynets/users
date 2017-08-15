<?php

namespace Numbers\Users\Organizations\Form;
class StrategicBusinessUnits extends \Object\Form\Wrapper\Base {
	public $form_link = 'sbu';
	public $options = [
		'segment' => self::SEGMENT_FORM,
		'actions' => [
			'refresh' => true,
			'new' => true,
			'back' => true
		]
	];
	public $containers = [
		'top' => ['default_row_type' => 'grid', 'order' => 100],
		'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
		// child containers
		'general_container' => ['default_row_type' => 'grid', 'order' => 32000],
		'contact_container' => ['default_row_type' => 'grid', 'order' => 32100],
		'children_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Organizations\Model\StrategicBusinessUnit\Organizations',
			'details_pk' => ['on_sborg_organization_id'],
			'required' => true,
			'order' => 35000
		],
	];
	public $rows = [
		'top' => [
			'on_sbu_id' => ['order' => 100],
			'on_sbu_name' => ['order' => 200],
		],
		'tabs' => [
			'general' => ['order' => 100, 'label_name' => 'General'],
			'children' => ['order' => 200, 'label_name' => 'Organizations']
		]
	];
	public $elements = [
		'top' => [
			'on_sbu_id' => [
				'on_sbu_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'SBU #', 'domain' => 'sbu_id_sequence', 'percent' => 50, 'navigation' => true],
				'on_sbu_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => true, 'navigation' => true]
			],
			'on_sbu_name' => [
				'on_sbu_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			]
		],
		'tabs' => [
			'general' => [
				'general' => ['container' => 'general_container', 'order' => 100],
				'contact' => ['container' => 'contact_container', 'order' => 200]
			],
			'children' => [
				'children' => ['container' => 'children_container', 'order' => 100]
			]
		],
		'general_container' => [
			'on_sbu_default_organization_id' => [
				'on_sbu_default_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Default Organization', 'domain' => 'organization_id', 'null' => true, 'required' => true, 'percent' => 90, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\DataSource\Organizations::optionsActive'],
				'on_sbu_hold' => ['order' => 3, 'label_name' => 'Hold', 'type' => 'boolean', 'percent' => 5],
				'on_sbu_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'separator_1' => [
				self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 400, 'label_name' => 'Contact Information', 'icon' => 'envelope-o', 'percent' => 100],
			],
			'on_sbu_email' => [
				'on_sbu_email' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
				'on_sbu_email2' => ['order' => 2, 'label_name' => 'Secondary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
			],
			'on_sbu_phone' => [
				'on_sbu_phone' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
				'on_sbu_phone2' => ['order' => 2, 'label_name' => 'Secondary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
			],
			'on_sbu_cell' => [
				'on_sbu_cell' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Cell Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
				'on_sbu_fax' => ['order' => 2, 'label_name' => 'Fax', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
			]
		],
		'children_container' => [
			'row1' => [
				'on_sborg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\DataSource\Organizations::optionsActive', 'onchange' => 'this.form.submit();'],
				'on_sborg_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'model' => '\Numbers\Users\Organizations\Model\StrategicBusinessUnits',
		'details' => [
			'\Numbers\Users\Organizations\Model\StrategicBusinessUnit\Organizations' => [
				'pk' => ['on_sborg_tenant_id', 'on_sborg_sbu_id', 'on_sborg_organization_id'],
				'type' => '1M',
				'map' => ['on_sbu_tenant_id' => 'on_sborg_tenant_id', 'on_sbu_id' => 'on_sborg_sbu_id'],
			]
		]
	];
}