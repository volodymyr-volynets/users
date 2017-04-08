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
		'permissions_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 3,
			'details_key' => '\Numbers\Users\Users\Model\Role\Permissions',
			'details_pk' => ['um_rolperm_resource_id', 'um_rolperm_method_code', 'um_rolperm_action_id'],
			'order' => 35000
		],
		'parents_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 3,
			'details_key' => '\Numbers\Users\Users\Model\Role\Children',
			'details_pk' => ['um_rolrol_parent_role_id'],
			'order' => 35000
		],
		'manages_container' => [
			'type' => 'details',
			'details_rendering_type' => 'grid_with_label',
			'details_new_rows' => 3,
			'details_key' => '\Numbers\Users\Users\Model\Role\Manages',
			'details_pk' => ['um_rolrol_child_role_id'],
			'order' => 35000
		],
		'notifications_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 3,
			'details_key' => '\Numbers\Users\Users\Model\Role\Notifications',
			'details_pk' => ['um_rolnoti_resource_id'],
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
			'parents' => ['order' => 200, 'label_name' => 'Parent Roles'],
			'permissions' => ['order' => 300, 'label_name' => 'Permisions'],
			'notifications' => ['order' => 400, 'label_name' => 'Notifications'],
			'manages' => ['order' => 500, 'label_name' => 'Manage Roles'],
			//\Object\Widgets::addresses => \Object\Widgets::addresses_data,
			//\Object\Widgets::attributes => \Object\Widgets::attributes_data
		]
	];
	public $elements = [
		'top' => [
			'um_role_id' => [
				'um_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role #', 'domain' => 'group_id_sequence', 'percent' => 50, 'required' => 'c', 'navigation' => true],
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
			'parents' => [
				'parents' => ['container' => 'parents_container', 'order' => 100],
			],
			'permissions' => [
				'permissions' => ['container' => 'permissions_container', 'order' => 100],
			],
			'notifications' => [
				'notifications' => ['container' => 'notifications_container', 'order' => 100],
			],
			'manages' => [
				'manages' => ['container' => 'manages_container', 'order' => 100],
			]
		],
		'general_container' => [
			'um_role_type_id' => [
				'um_role_type_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'type_id', 'default' => 10, 'percent' => 50, 'required' => true, 'no_choose' => true, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Role\Types'],
				'um_role_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 50]
			],
			'um_role_global' => [
				'um_role_icon' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 70, 'method' => 'select', 'options_model' => 'numbers_frontend_html_fontawesome_model_icons::options', 'searchable' => true],
				'um_role_global' => ['order' => 2, 'label_name' => 'Global', 'type' => 'boolean', 'percent' => 15],
				'um_role_super_admin' => ['order' => 3, 'label_name' => 'Super Admin', 'type' => 'boolean', 'percent' => 15],
			],
		],
		'parents_container' => [
			'row1' => [
				'um_rolrol_parent_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role', 'domain' => 'group_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Roles::optionsActive', 'onchange' => 'this.form.submit();'],
				'um_rolrol_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'manages_container' => [
			'row1' => [
				'um_rolman_child_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role', 'domain' => 'group_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\Model\Roles::optionsActive', 'onchange' => 'this.form.submit();'],
				'um_rolman_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			'row2' => [
				'um_rolman_assign_roles' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Assign Roles', 'type' => 'boolean', 'percent' => 15],
				'um_rolman_reset_password' => ['order' => 2, 'label_name' => 'Reset Password', 'type' => 'boolean', 'percent' => 15],
			]
		],
		'permissions_container' => [
			'row1' => [
				'um_rolperm_resource_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\ACL\Controllers2::optionsGroupped', 'options_params' => ['sm_resource_acl_permission' => 1], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
				'um_rolperm_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 45, 'method' => 'select', 'options_model' => '\Numbers\Backend\System\Modules\DataSource\Resource\Map::optionsJson', 'options_depends' => ['sm_rsrcmp_resource_id' => 'um_rolperm_resource_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['action_id' => 'um_rolperm_action_id', 'method_code' => 'um_rolperm_method_code']],
				'um_rolperm_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			self::HIDDEN => [
				'um_rolperm_method_code' => ['order' => 4, 'label_name' => 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'method' => 'hidden']
			]
		],
		'notifications_container' => [
			'row1' => [
				'um_rolnoti_module_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Notification', 'domain' => 'module_id', 'required' => true, 'details_unique_select' => true, 'null' => true, 'percent' => 95, 'method' => 'select', 'options_model' => 'numbers_tenants_tenants_datasource_module_features::options_json', 'options_params' => ['sm_feature_type' => 20], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['module_id' => 'um_rolnoti_module_id', 'feature_code' => 'um_rolnoti_feature_code']],
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
				'map' => ['um_role_tenant_id' => 'um_rolrol_tenant_id', 'um_role_id' => 'um_rolrol_child_role_id'],
				'sql' => [
					'where' => [
						'um_rolrol_structure_code' => 'PARENT'
					]
				]
			],
			'\Numbers\Users\Users\Model\Role\Manages' => [
				'pk' => ['um_rolman_tenant_id', 'um_rolman_parent_role_id', 'um_rolman_child_role_id'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolman_tenant_id', 'um_role_id' => 'um_rolman_parent_role_id']
			],
			'\Numbers\Users\Users\Model\Role\Permissions' => [
				'pk' => ['um_rolperm_tenant_id', 'um_rolperm_role_id', 'um_rolperm_resource_id', 'um_rolperm_method_code', 'um_rolperm_action_id'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolperm_tenant_id', 'um_role_id' => 'um_rolperm_role_id']
			],
			'\Numbers\Users\Users\Model\Role\Notifications' => [
				'pk' => ['um_rolnoti_tenant_id', 'um_rolnoti_role_id', 'um_rolnoti_module_id', 'um_rolnoti_feature_code'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolnoti_tenant_id', 'um_role_id' => 'um_rolnoti_role_id']
			]
		]
	];

	public function validate(& $form) {
		
	}
}