<?php

namespace Numbers\Users\Users\Form;
class Roles extends \Object\Form\Wrapper\Base {
	public $form_link = 'roles';
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
			'details_pk' => ['um_rolperm_resource_id', 'um_rolperm_method_code', 'um_rolperm_action_id'],
			'order' => 35000
		],
		'parents_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\Role\Children',
			'details_pk' => ['um_rolrol_parent_role_id'],
			'order' => 35000
		],
		'manages_container' => [
			'type' => 'details',
			'details_rendering_type' => 'grid_with_label',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\Role\Manages',
			'details_pk' => ['um_rolrol_child_role_id'],
			'order' => 35000
		],
		'assignments_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\Role\Assignments',
			'details_pk' => ['um_rolassign_assignment_code'],
			'order' => 35000
		],
		'reverse_assignments_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 0,
			'details_key' => '\Numbers\Users\Users\Model\Role\Assignment\Reverse',
			'details_pk' => ['um_rolassign_assignment_code'],
			'details_cannot_delete' => true,
			'order' => 35000
		],
		'notifications_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 1,
			'details_key' => '\Numbers\Users\Users\Model\Role\Notifications',
			'details_pk' => ['um_rolnoti_module_id', 'um_rolnoti_feature_code'],
			'order' => 35000
		]
	];

	public $rows = [
		'top' => [
			'um_user_id' => ['order' => 100],
			'um_user_name' => ['order' => 200],
		],
		'tabs' => [
			'general' => ['order' => 100, 'label_name' => 'General'],
			'organizations' => ['order' => 150, 'label_name' => 'Organizations'],
			'parents' => ['order' => 200, 'label_name' => 'Inherit'],
			'permissions' => ['order' => 300, 'label_name' => 'Permisions'],
			'notifications' => ['order' => 400, 'label_name' => 'Notifications'],
			'assigments' => ['order' => 450, 'label_name' => 'Assignments'],
			'manages' => ['order' => 500, 'label_name' => 'Manage'],
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
			'assigments' => [
				'assigments' => ['container' => 'assignments_container', 'order' => 100],
				'separator_container' => ['container' => 'separator_container', 'order' => 150],
				'assigments_reverse' => ['container' => 'reverse_assignments_container', 'order' => 200],
			],
			'manages' => [
				'manages' => ['container' => 'manages_container', 'order' => 100],
			]
		],
		'general_container' => [
			'um_role_type_id' => [
				'um_role_type_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'type_id', 'default' => 10, 'percent' => 70, 'required' => true, 'no_choose' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Role\Types'],
				'um_role_global' => ['order' => 2, 'label_name' => 'Global', 'type' => 'boolean', 'percent' => 15, 'onchange' => 'this.form.submit();'],
				'um_role_super_admin' => ['order' => 3, 'label_name' => 'Super Admin', 'type' => 'boolean', 'percent' => 15],
				'um_role_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 15]
			],
			'um_role_icon' => [
				'um_role_icon' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Frontend\HTML\FontAwesome\Model\Icons::options', 'searchable' => true],
			],
			'um_role_department_id' => [
				'um_role_department_id' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Department', 'domain' => 'department_id', 'null' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\Model\Departments::optionsActive', 'searchable' => true],
			]
		],
		'organizations_container' => [
			'row1' => [
				'um_rolorg_organization_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Organization', 'domain' => 'organization_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Organizations\DataSource\Organizations::optionsActive', 'onchange' => 'this.form.submit();'],
				'um_rolorg_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'parents_container' => [
			'row1' => [
				'um_rolrol_parent_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role', 'domain' => 'role_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Roles::optionsActive', 'options_params' => ['um_role_global' => 1], 'onchange' => 'this.form.submit();'],
				'um_rolrol_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'assignments_container' => [
			'row1' => [
				'um_rolassign_assignment_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Assignment', 'domain' => 'type_code', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 90, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Assignment\Types::optionsJson', 'options_depends' => ['um_assigntype_parent_role_id' => 'parent::um_role_id'], 'onchange' => 'this.form.submit();', 'json_contains' => ['assignment_code' => 'um_rolassign_assignment_code', 'parent_role_id' => 'um_rolassign_parent_role_id', 'child_role_id' => 'um_rolassign_child_role_id']],
				'um_rolassign_mandatory' => ['order' => 2, 'label_name' => 'Mandatory', 'type' => 'boolean', 'percent' => 5],
				'um_rolassign_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			self::HIDDEN => [
				'um_rolassign_parent_role_id' => ['label_name' => 'Parent Role #', 'domain' => 'role_id', 'null' => true],
				'um_rolassign_child_role_id' => ['label_name' => 'Child Role #', 'domain' => 'role_id', 'null' => true],
			]
		],
		'separator_container' => [
			'separator_1' => [
				self::SEPARATOR_HORIZONTAL => ['order' => 1, 'label_name' => 'Other Assignments', 'icon' => 'cogs', 'percent' => 100],
			],
		],
		'reverse_assignments_container' => [
			'row1' => [
				'um_rolassign_assignment_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Assignment', 'domain' => 'type_code', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 90, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Assignment\Types::optionsJson', 'options_depends' => ['um_assigntype_child_role_id' => 'parent::um_role_id'], 'onchange' => 'this.form.submit();', 'json_contains' => ['assignment_code' => 'um_rolassign_assignment_code', 'parent_role_id' => 'um_rolassign_parent_role_id', 'child_role_id' => 'um_rolassign_child_role_id'], 'persistent' => true],
				'um_rolassign_mandatory' => ['order' => 2, 'label_name' => 'Mandatory', 'type' => 'boolean', 'percent' => 5, 'persistent' => true],
				'um_rolassign_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5, 'persistent' => true]
			],
			self::HIDDEN => [
				'um_rolassign_parent_role_id' => ['label_name' => 'Parent Role #', 'domain' => 'role_id', 'null' => true],
				'um_rolassign_child_role_id' => ['label_name' => 'Child Role #', 'domain' => 'role_id', 'null' => true],
			]
		],
		'manages_container' => [
			'row1' => [
				'um_rolman_child_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role', 'domain' => 'role_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Roles::optionsActive', 'onchange' => 'this.form.submit();'],
				'um_rolman_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'row2' => [
				'um_rolman_assign_roles' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Assign Roles', 'type' => 'boolean', 'percent' => 15],
				'um_rolman_reset_password' => ['order' => 2, 'label_name' => 'Reset Password', 'type' => 'boolean', 'percent' => 15],
				'um_rolman_manage_children' => ['order' => 3, 'label_name' => 'Manage Children', 'type' => 'boolean', 'percent' => 15],
				'um_rolman_assignment_code' => ['order' => 4, 'label_name' => 'Follow Assignment', 'domain' => 'type_code', 'null' => true, 'percent' => 55, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\User\Assignment\Types::optionsActive', 'options_depends' => ['um_assigntype_parent_role_id' => 'parent::um_role_id', 'um_assigntype_child_role_id' => 'detail::um_rolman_child_role_id']],
			]
		],
		'permissions_container' => [
			'row1' => [
				'um_rolperm_resource_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'percent' => 60, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Controllers2::optionsJson', 'options_params' => ['sm_resource_acl_permission' => 1], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_rolperm_module_id', 'resource_id' => 'um_rolperm_resource_id']],
				'um_rolperm_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 35, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Resource\Map::optionsJson', 'options_depends' => ['sm_rsrcmp_resource_id' => 'um_rolperm_resource_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['action_id' => 'um_rolperm_action_id', 'method_code' => 'um_rolperm_method_code']],
				'um_rolperm_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			self::HIDDEN => [
				'um_rolperm_method_code' => ['order' => 1, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'method' => 'hidden'],
				'um_rolperm_module_id' => ['order' => 2, 'label_name' => 'Module #', 'domain' => 'module_id', 'required' => true, 'null' => true, 'method' => 'hidden'],
			]
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
		'buttons' => [
			self::BUTTONS => self::BUTTONS_DATA_GROUP
		]
	];
	public $collection = [
		'model' => '\Numbers\Users\Users\Model\Roles',
		'details' => [
			'\Numbers\Users\Users\Model\Role\Children' => [
				'pk' => ['um_rolrol_tenant_id', 'um_rolrol_parent_role_id', 'um_rolrol_child_role_id'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolrol_tenant_id', 'um_role_id' => 'um_rolrol_child_role_id']
			],
			'\Numbers\Users\Users\Model\Role\Manages' => [
				'pk' => ['um_rolman_tenant_id', 'um_rolman_parent_role_id', 'um_rolman_child_role_id'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolman_tenant_id', 'um_role_id' => 'um_rolman_parent_role_id']
			],
			'\Numbers\Users\Users\Model\Role\Assignments' => [
				'pk' => ['um_rolassign_tenant_id', 'um_rolassign_parent_role_id', 'um_rolassign_assignment_code', 'um_rolassign_child_role_id'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolassign_tenant_id', 'um_role_id' => 'um_rolassign_parent_role_id']
			],
			'\Numbers\Users\Users\Model\Role\Assignment\Reverse' => [
				'pk' => ['um_rolassign_tenant_id', 'um_rolassign_parent_role_id', 'um_rolassign_assignment_code', 'um_rolassign_child_role_id'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolassign_tenant_id', 'um_role_id' => 'um_rolassign_child_role_id'],
				'readonly' => true
			],
			'\Numbers\Users\Users\Model\Role\Permissions' => [
				'pk' => ['um_rolperm_tenant_id', 'um_rolperm_role_id', 'um_rolperm_module_id', 'um_rolperm_resource_id', 'um_rolperm_method_code', 'um_rolperm_action_id'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolperm_tenant_id', 'um_role_id' => 'um_rolperm_role_id']
			],
			'\Numbers\Users\Users\Model\Role\Notifications' => [
				'pk' => ['um_rolnoti_tenant_id', 'um_rolnoti_role_id', 'um_rolnoti_module_id', 'um_rolnoti_feature_code'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolnoti_tenant_id', 'um_role_id' => 'um_rolnoti_role_id']
			],
			'\Numbers\Users\Users\Model\Role\Organizations' => [
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
			$form->values['\Numbers\Users\Users\Model\Role\Manages'] = [];
			$form->values['\Numbers\Users\Users\Model\Role\Assignments'] = [];
			$form->values['\Numbers\Users\Users\Model\Role\Assignment\Reverse'] = [];
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
			if (in_array($tab_name, ['organizations', 'parents', 'assigments', 'manages'])) {
				return ['hidden' => true];
			}
		}
	}
}