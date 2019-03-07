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
		'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
		'buttons' => ['default_row_type' => 'grid', 'order' => 900],
		'roles_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\User\Owner\Type\Roles',
			'details_pk' => ['um_ownertprole_role_id'],
			'required' => true,
			'order' => 32000,
		],
		'organizations_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\User\Owner\Type\Organizations',
			'details_pk' => ['um_ownertporg_organization_id'],
			'required' => true,
			'order' => 35001,
		],
	];
	public $rows = [
		'tabs' => [
			'organizations' => ['order' => 100, 'label_name' => 'Organizations'],
			'roles' => ['order' => 200, 'label_name' => 'Roles'],
		]
	];
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
				'um_ownertype_readonly' => ['order' => 3, 'label_name' => 'Readonly', 'type' => 'boolean', 'percent' => 15],
			],
		],
		'tabs' => [
			'organizations' => [
				'organizations' => ['container' => 'organizations_container', 'order' => 100],
			],
			'roles' => [
				'roles' => ['container' => 'roles_container', 'order' => 100],
			],
		],
		'roles_container' => [
			'row1' => [
				'um_ownertprole_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role', 'domain' => 'role_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Roles', 'onchange' => 'this.form.submit();'],
				'um_ownertprole_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'organizations_container' => [
			'row1' => [
				'um_ownertporg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive', 'onchange' => 'this.form.submit();'],
				'um_ownertporg_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Owner Types',
		'model' => '\Numbers\Users\Users\Model\User\Owner\Types',
		'details' => [
			'\Numbers\Users\Users\Model\User\Owner\Type\Roles' => [
				'name' => 'Owner Roles',
				'pk' => ['um_ownertprole_tenant_id', 'um_ownertprole_ownertype_id', 'um_ownertprole_role_id'],
				'type' => '1M',
				'map' => ['um_ownertype_tenant_id' => 'um_ownertprole_tenant_id', 'um_ownertype_id' => 'um_ownertprole_ownertype_id'],
			],
			'\Numbers\Users\Users\Model\User\Owner\Type\Organizations' => [
				'name' => 'Owner Organizations',
				'pk' => ['um_ownertporg_tenant_id', 'um_ownertporg_ownertype_id', 'um_ownertporg_organization_id'],
				'type' => '1M',
				'map' => ['um_ownertype_tenant_id' => 'um_ownertporg_tenant_id', 'um_ownertype_id' => 'um_ownertporg_ownertype_id'],
			]
		]
	];

	public function processOptionsModels(& $form, $field_name, $details_key, $details_parent_key, & $where, $neighbouring_values, $details_value) {
		if ($field_name == 'um_ownertprole_role_id') {
			$where['selected_organizations'] = array_extract_values_by_key($form->values['\Numbers\Users\Users\Model\User\Owner\Type\Organizations'], 'um_ownertporg_organization_id', ['unique' => true]);
		}
	}
}