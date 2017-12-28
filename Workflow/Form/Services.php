<?php

namespace Numbers\Users\Workflow\Form;
class Services extends \Object\Form\Wrapper\Base {
	public $form_link = 'ww_services';
	public $module_code = 'WW';
	public $title = 'W/W Services Form';
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
		'all_roles_container' => ['default_row_type' => 'grid', 'order' => 32000],
		'roles_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Workflow\Model\Service\Roles',
			'details_pk' => ['ww_servrol_role_id'],
			'order' => 35000
		],
		'organizations_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Workflow\Model\Service\Organizations',
			'details_pk' => ['ww_servorg_organization_id'],
			'required' => true,
			'order' => 35001
		]
	];

	public $rows = [
		'top' => [
			'ww_service_id' => ['order' => 100],
			'ww_service_name' => ['order' => 200],
		],
		'tabs' => [
			'general' => ['order' => 200, 'label_name' => 'General'],
			'organizations' => ['order' => 225, 'label_name' => 'Organizations'],
			'roles' => ['order' => 250, 'label_name' => 'Roles'],
		]
	];
	public $elements = [
		'top' => [
			'ww_service_id' => [
				'ww_service_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Service #', 'domain' => 'service_id_sequence', 'percent' => 50, 'required' => false, 'navigation' => true],
				'ww_service_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 45, 'required' => true, 'navigation' => true],
				'ww_service_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'ww_service_name' => [
				'ww_service_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			]
		],
		'tabs' => [
			'general' => [
				'general' => ['container' => 'general_container', 'order' => 100],
			],
			'organizations' => [
				'organizations' => ['container' => 'organizations_container', 'order' => 100],
			],
			'roles' => [
				'all_roles' => ['container' => 'all_roles_container', 'order' => 50],
				'roles' => ['container' => 'roles_container', 'order' => 100],
			]
		],
		'general_container' => [
			'ww_service_workflow_id' => [
				'ww_service_workflow_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Workflow #', 'domain' => 'workflow_id', 'null' => true, 'required' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Workflow\Model\Workflows::optionsActive', 'options_params' => ['ww_workflow_versioned' => 1]],
			]
		],
		'all_roles_container' => [
			'ww_service_all_roles' => [
				'ww_service_all_roles' => ['order' => 1, 'row_order' => 100, 'label_name' => 'All Roles', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'roles_container' => [
			'row1' => [
				'ww_servrol_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role', 'domain' => 'role_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\Roles', 'onchange' => 'this.form.submit();'],
				'ww_servrol_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'organizations_container' => [
			'row1' => [
				'ww_servorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\DataSource\Organizations::optionsActive', 'onchange' => 'this.form.submit();'],
				'ww_servorg_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Services',
		'model' => '\Numbers\Users\Workflow\Model\Services',
		'details' => [
			'\Numbers\Users\Workflow\Model\Service\Organizations' => [
				'name' => 'Organizations',
				'pk' => ['ww_servorg_tenant_id', 'ww_servorg_service_id', 'ww_servorg_organization_id'],
				'type' => '1M',
				'map' => ['ww_service_tenant_id' => 'ww_servorg_tenant_id', 'ww_service_id' => 'ww_servorg_service_id']
			],
			'\Numbers\Users\Workflow\Model\Service\Roles' => [
				'name' => 'Roles',
				'pk' => ['ww_servrol_tenant_id', 'ww_servrol_service_id', 'ww_servrol_role_id'],
				'type' => '1M',
				'map' => ['ww_service_tenant_id' => 'ww_servrol_tenant_id', 'ww_service_id' => 'ww_servrol_service_id']
			]
		]
	];

	public function validate(& $form) {

	}

	public function processOptionsModels(& $form, $field_name, $details_key, $details_parent_key, & $where) {
		if ($field_name == 'ww_servrol_role_id') {
			$where['selected_organizations'] = array_extract_values_by_key($form->values['\Numbers\Users\Workflow\Model\Service\Organizations'], 'ww_servorg_organization_id', ['unique' => true]);
		}
	}
}