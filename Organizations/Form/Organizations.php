<?php

namespace Numbers\Users\Organizations\Form;
class Organizations extends \Object\Form\Wrapper\Base {
	public $form_link = 'organizations';
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
		'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
		// child containers
		'general_container' => ['default_row_type' => 'grid', 'order' => 32000],
		'contact_container' => ['default_row_type' => 'grid', 'order' => 32100],
		'children_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 3,
			'details_key' => '\Numbers\Users\Organizations\Model\Organization\Children',
			'details_pk' => ['on_orgchl_child_organization_id'],
			'order' => 35000
		],
	];
	public $rows = [
		'top' => [
			'on_organization_id' => ['order' => 100],
			'on_organization_name' => ['order' => 200],
		],
		'tabs' => [
			'general' => ['order' => 100, 'label_name' => 'General'],
			'children' => ['order' => 200, 'label_name' => 'Children'],
			\Numbers\Countries\Widgets\Addresses\Base::ADDRESSES => \Numbers\Countries\Widgets\Addresses\Base::ADDRESSES_DATA,
			\Numbers\Tenants\Widgets\Attributes\Base::ATTRIBUTES => \Numbers\Tenants\Widgets\Attributes\Base::ATTRIBUTES_DATA,
		]
	];
	public $elements = [
		'top' => [
			'on_organization_id' => [
				'on_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization #', 'domain' => 'organization_id_sequence', 'percent' => 50, 'required' => 'c', 'navigation' => true],
				'on_organization_code' => ['order' => 2, 'label_name' => 'Organization Code', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => true, 'navigation' => true]
			],
			'on_organization_name' => [
				'on_organization_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
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
			'um_user_type_id' => [
				'\Numbers\Users\Organizations\Model\Organization\Type\Map' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Types', 'domain' => 'type_code', 'multiple_column' => 'on_orgtpmap_type_code', 'percent' => 90, 'method' => 'multiselect', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organization\Types::optionsGroupped'],
				'on_organization_hold' => ['order' => 3, 'label_name' => 'Hold', 'type' => 'boolean', 'percent' => 5],
				'on_organization_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'on_organization_icon' => [
				'on_organization_icon' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Frontend\HTML\FontAwesome\Model\Icons::options', 'searchable' => true],
			],
			'separator_1' => [
				self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 400, 'label_name' => 'Contact Information', 'icon' => 'envelope-o', 'percent' => 100],
			],
			'on_organization_email' => [
				'on_organization_email' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
				'on_organization_email2' => ['order' => 2, 'label_name' => 'Secondary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
			],
			'on_organization_phone' => [
				'on_organization_phone' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
				'on_organization_phone2' => ['order' => 2, 'label_name' => 'Secondary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
			],
			'on_organization_cell' => [
				'on_organization_cell' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Cell Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
				'on_organization_fax' => ['order' => 2, 'label_name' => 'Fax', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
			]
		],
		'children_container' => [
			'row1' => [
				'on_orgchl_child_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => false, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsActive', 'onchange' => 'this.form.submit();'],
				'on_orgchl_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Organizations',
		'model' => '\Numbers\Users\Organizations\Model\Organizations',
		'details' => [
			'\Numbers\Users\Organizations\Model\Organization\Type\Map' => [
				'name' => 'Types',
				'pk' => ['on_orgtpmap_tenant_id', 'on_orgtpmap_organization_id', 'on_orgtpmap_type_code'],
				'type' => '1M',
				'map' => ['on_organization_tenant_id' => 'on_orgtpmap_tenant_id', 'on_organization_id' => 'on_orgtpmap_organization_id']
			],
			'\Numbers\Users\Organizations\Model\Organization\Children' => [
				'name' => 'Children',
				'pk' => ['on_orgchl_tenant_id', 'on_orgchl_parent_organization_id', 'on_orgchl_child_organization_id'],
				'type' => '1M',
				'map' => ['on_organization_tenant_id' => 'on_orgchl_tenant_id', 'on_organization_id' => 'on_orgchl_parent_organization_id'],
			]
		]
	];
}