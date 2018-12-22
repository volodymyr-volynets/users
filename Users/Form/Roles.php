<?php

namespace Numbers\Users\Users\Form;
class Roles extends \Object\Form\Wrapper\Base {
	public $form_link = 'um_roles';
	public $module_code = 'UM';
	public $title = 'U/M Roles Form';
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
		'organizations_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\Role\Organizations',
			'details_pk' => ['um_rolorg_organization_id'],
			'order' => 35000
		],
		'permissions_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\Role\Permissions',
			'details_pk' => ['um_rolperm_module_id', 'um_rolperm_resource_id'],
			'order' => 35000
		],
		'permission_actions_container' => [
			'type' => 'subdetails',
			'label_name' => 'Actions',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_parent_key' => '\Numbers\Users\Users\Model\Role\Permissions',
			'details_key' => '\Numbers\Users\Users\Model\Role\Permission\Actions',
			'details_pk' => ['um_rolperaction_method_code', 'um_rolperaction_action_id'],
			'order' => 1000,
			'required' => true
		],
		'permission_subresources_container' => [
			'type' => 'subdetails',
			'label_name' => 'Subresources',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_parent_key' => '\Numbers\Users\Users\Model\Role\Permissions',
			'details_key' => '\Numbers\Users\Users\Model\Role\Permission\Subresources',
			'details_pk' => ['um_rolsubres_rsrsubres_id', 'um_rolsubres_action_id'],
			'order' => 2000,
			'required' => false
		],
		'parents_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\Role\Children',
			'details_pk' => ['um_rolrol_parent_role_id'],
			'order' => 35000
		],
		'notifications_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\Role\Notifications',
			'details_pk' => ['um_rolnoti_module_id', 'um_rolnoti_feature_code'],
			'order' => 35000
		],
		'features_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\Role\Features',
			'details_pk' => ['um_rolfeature_module_id', 'um_rolfeature_feature_code'],
			'order' => 35000
		]
	];

	public $rows = [
		'top' => [
			'um_role_id' => ['order' => 100],
			'um_role_name' => ['order' => 200],
		],
		'tabs' => [
			'general' => ['order' => 100, 'label_name' => 'General'],
			'organizations' => ['order' => 150, 'label_name' => 'Organizations'],
			'parents' => ['order' => 200, 'label_name' => 'Inherit'],
			'permissions' => ['order' => 300, 'label_name' => 'Permisions'],
			'notifications' => ['order' => 400, 'label_name' => 'Notifications'],
			'features' => ['order' => 450, 'label_name' => 'Features'],
		]
	];
	public $elements = [
		'top' => [
			'um_role_id' => [
				'um_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role #', 'domain' => 'role_id_sequence', 'percent' => 50, 'required' => 'c', 'navigation' => true],
				'um_role_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'percent' => 50, 'required' => true, 'navigation' => true]
			],
			'um_role_name' => [
				'um_role_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
			]
		],
		'tabs' => [
			'general' => [
				'general' => ['container' => 'general_container', 'order' => 100],
			],
			'organizations' => [
				'organizations' => ['container' => 'organizations_container', 'order' => 100],
			],
			'parents' => [
				'parents' => ['container' => 'parents_container', 'order' => 100],
			],
			'permissions' => [
				'permissions' => ['container' => 'permissions_container', 'order' => 100],
			],
			'notifications' => [
				'notifications' => ['container' => 'notifications_container', 'order' => 100],
			],
			'features' => [
				'features' => ['container' => 'features_container', 'order' => 100],
			],
		],
		'general_container' => [
			'um_role_type_id' => [
				'um_role_type_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'type_id', 'default' => 10, 'percent' => 55, 'required' => true, 'no_choose' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Role\Types'],
				'um_role_global' => ['order' => 2, 'label_name' => 'Global', 'type' => 'boolean', 'percent' => 15, 'onchange' => 'this.form.submit();'],
				'um_role_super_admin' => ['order' => 3, 'label_name' => 'Super Admin', 'type' => 'boolean', 'percent' => 15],
				'um_role_inactive' => ['order' => 5, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
			],
			'um_role_icon' => [
				'um_role_icon' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Frontend\HTML\FontAwesome\Model\Icons::options', 'searchable' => true],
				'um_role_weight' => ['order' => 2, 'label_name' => 'Weight', 'type' => 'integer', 'null' => true, 'required' => true, 'percent' => 50]
			],
			'um_role_department_id' => [
				'um_role_department_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Department', 'domain' => 'department_id', 'null' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Departments::optionsActive', 'searchable' => true],
			]
		],
		'organizations_container' => [
			'row1' => [
				'um_rolorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive', 'options_params' => ['on_organization_subtype_id' => 10], 'onchange' => 'this.form.submit();'],
				'um_rolorg_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'parents_container' => [
			'row1' => [
				'um_rolrol_parent_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role', 'domain' => 'role_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Roles::optionsActive', 'options_params' => ['um_role_global' => 1], 'onchange' => 'this.form.submit();'],
				'um_rolrol_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'permissions_container' => [
			'row1' => [
				'um_rolperm_resource_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Controllers2::optionsJson', 'options_params' => ['sm_resource_acl_permission' => 1], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_rolperm_module_id', 'resource_id' => 'um_rolperm_resource_id']],
				'um_rolperm_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			self::HIDDEN => [
				'um_rolperm_module_id' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
			]
		],
		'permission_actions_container' => [
			'row1' => [
				'um_rolperaction_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 85, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Resource\Map::optionsJson', 'options_depends' => ['sm_rsrcmp_resource_id' => 'detail::um_rolperm_resource_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['action_id' => 'um_rolperaction_action_id', 'method_code' => 'um_rolperaction_method_code']],
				'um_rolperaction_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
			],
			self::HIDDEN => [
				'um_rolperaction_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'method' => 'hidden'],
			]
		],
		'permission_subresources_container' => [
			'row1' => [
				'um_rolsubres_rsrsubres_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Subresource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Subresources::optionsGrouped', 'options_depends' => ['resource_id' => 'detail::um_rolperm_resource_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
				'um_rolsubres_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Subresource\Actions::optionsGrouped', 'options_depends' => ['rsrsubres_id' => 'um_rolsubres_rsrsubres_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
				'um_rolsubres_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
			],
		],
		'notifications_container' => [
			'row1' => [
				'um_rolnoti_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Notification', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Module\Features::optionsJson', 'options_params' => ['sm_feature_type' => 20], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_rolnoti_module_id', 'feature_code' => 'um_rolnoti_feature_code']],
				'um_rolnoti_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			self::HIDDEN => [
				'um_rolnoti_feature_code' => ['order' => 4, 'label_name' => 'Feature', 'domain' => 'feature_code', 'required' => true, 'null' => true, 'method' => 'hidden']
			]
		],
		'features_container' => [
			'row1' => [
				'um_rolfeature_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Feature', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\DataSource\Module\Features::optionsJson', 'options_params' => ['sm_feature_type' => 40], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_rolfeature_module_id', 'feature_code' => 'um_rolfeature_feature_code']],
				'um_rolfeature_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			self::HIDDEN => [
				'um_rolfeature_feature_code' => ['order' => 4, 'label_name' => 'Feature', 'domain' => 'feature_code', 'required' => true, 'null' => true, 'method' => 'hidden']
			]
		],
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'name' => 'Roles',
		'model' => '\Numbers\Users\Users\Model\Roles',
		'details' => [
			'\Numbers\Users\Users\Model\Role\Children' => [
				'name' => 'Children',
				'pk' => ['um_rolrol_tenant_id', 'um_rolrol_parent_role_id', 'um_rolrol_child_role_id'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolrol_tenant_id', 'um_role_id' => 'um_rolrol_child_role_id']
			],
			'\Numbers\Users\Users\Model\Role\Permissions' => [
				'name' => 'Permissions',
				'pk' => ['um_rolperm_tenant_id', 'um_rolperm_role_id', 'um_rolperm_module_id', 'um_rolperm_resource_id'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolperm_tenant_id', 'um_role_id' => 'um_rolperm_role_id'],
				'details' => [
					'\Numbers\Users\Users\Model\Role\Permission\Actions' => [
						'name' => 'Permission Actions',
						'pk' => ['um_rolperaction_tenant_id', 'um_rolperaction_role_id', 'um_rolperaction_module_id', 'um_rolperaction_resource_id', 'um_rolperaction_method_code', 'um_rolperaction_action_id'],
						'type' => '1M',
						'map' => ['um_rolperm_tenant_id' => 'um_rolperaction_tenant_id', 'um_rolperm_role_id' => 'um_rolperaction_role_id', 'um_rolperm_module_id' => 'um_rolperaction_module_id', 'um_rolperm_resource_id' => 'um_rolperaction_resource_id'],
					],
					'\Numbers\Users\Users\Model\Role\Permission\Subresources' => [
						'name' => 'Permission Subresources',
						'pk' => ['um_rolsubres_tenant_id', 'um_rolsubres_role_id', 'um_rolsubres_module_id', 'um_rolsubres_resource_id', 'um_rolsubres_rsrsubres_id', 'um_rolsubres_action_id'],
						'type' => '1M',
						'map' => ['um_rolperm_tenant_id' => 'um_rolsubres_tenant_id', 'um_rolperm_role_id' => 'um_rolsubres_role_id', 'um_rolperm_module_id' => 'um_rolsubres_module_id', 'um_rolperm_resource_id' => 'um_rolsubres_resource_id'],
					]
				]
			],
			'\Numbers\Users\Users\Model\Role\Notifications' => [
				'name' => 'Notifications',
				'pk' => ['um_rolnoti_tenant_id', 'um_rolnoti_role_id', 'um_rolnoti_module_id', 'um_rolnoti_feature_code'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolnoti_tenant_id', 'um_role_id' => 'um_rolnoti_role_id']
			],
			'\Numbers\Users\Users\Model\Role\Features' => [
				'name' => 'Features',
				'pk' => ['um_rolfeature_tenant_id', 'um_rolfeature_role_id', 'um_rolfeature_module_id', 'um_rolfeature_feature_code'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolfeature_tenant_id', 'um_role_id' => 'um_rolfeature_role_id']
			],
			'\Numbers\Users\Users\Model\Role\Organizations' => [
				'name' => 'Organizations',
				'pk' => ['um_rolorg_tenant_id', 'um_rolorg_role_id', 'um_rolorg_organization_id'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolorg_tenant_id', 'um_role_id' => 'um_rolorg_role_id']
			]
		]
	];

	public function validate(& $form) {
		if (!empty($form->values['um_role_global'])) {
			if (!empty($form->values['um_role_super_admin'])) {
				$form->error(DANGER, 'Global roles cannot be super admins!', 'um_role_super_admin');
			}
			// empty other values
			$form->values['\Numbers\Users\Users\Model\Role\Children'] = [];
			$form->values['\Numbers\Users\Users\Model\Role\Organizations'] = [];
		}
		// roles must have mandatory organizations
		if (empty($form->values['um_role_global']) && empty($form->values['um_role_super_admin'])) {
			if (empty($form->values['\Numbers\Users\Users\Model\Role\Organizations'])) {
				$form->error(DANGER, \Object\Content\Messages::REQUIRED_FIELD, '\Numbers\Users\Users\Model\Role\Organizations[1][um_rolorg_organization_id]');
			}
		}
	}

	public function processOptionsModels(& $form, $field_name, $details_key, $details_parent_key, & $where) {
		if ($field_name == 'um_rolrel_relationship_code') {
			$where['selected_organizations'] = array_extract_values_by_key($form->values['\Numbers\Users\Users\Model\Role\Organizations'], 'um_rolorg_organization_id', ['unique' => true]);
		}
	}

	public function overrideTabs(& $form, & $tab_options, & $tab_name, & $neighbouring_values = []) {
		// we hide all tabs if global
		if (!empty($form->values['um_role_global'])) {
			if (in_array($tab_name, ['organizations', 'parents', 'assigments'])) {
				return ['hidden' => true];
			}
		}
	}
}