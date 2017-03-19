<?php

class numbers_users_users_form_roles extends object_form_wrapper_base {
	public $form_link = 'roles';
	public $options = [
		'segment' => self::segment_form,
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
			'details_key' => 'numbers_users_users_model_role_permissions',
			'details_pk' => ['um_rolperm_resource_id', 'um_rolperm_method_code', 'um_rolperm_action_id'],
			'order' => 35000
		],
		'parents_container' => [
			'type' => 'details',
			'details_rendering_type' => 'table',
			'details_new_rows' => 3,
			'details_key' => 'numbers_users_users_model_user_organizations',
			'details_pk' => ['um_usrorg_organization_id'],
			'order' => 35001
		]
	];
	public $rows = [
		'top' => [
			'um_user_id' => ['order' => 100],
			'um_user_name' => ['order' => 200],
		],
		'tabs' => [
			'general' => ['order' => 100, 'label_name' => 'General'],
			'permissions' => ['order' => 200, 'label_name' => 'Permisions'],
			'parents' => ['order' => 300, 'label_name' => 'Parent Roles'],
			//object_widgets::addresses => object_widgets::addresses_data,
			//object_widgets::attributes => object_widgets::attributes_data
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
			'permissions' => [
				'permissions' => ['container' => 'permissions_container', 'order' => 100],
			],
			'parents' => [
				'parents' => ['container' => 'parents_container', 'order' => 100],
			]
		],
		'general_container' => [
			'um_role_type_id' => [
				'um_role_type_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'type_id', 'default' => 10, 'percent' => 50, 'required' => true, 'no_choose' => true, 'method' => 'select', 'options_model' => 'numbers_users_users_model_role_types'],
				'um_role_inactive' => ['order' => 4, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 50]
			],
			'um_role_global' => [
				'um_role_global' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Global', 'type' => 'boolean', 'percent' => 50],
				'um_role_super_admin' => ['order' => 2, 'label_name' => 'Super Admin', 'type' => 'boolean', 'percent' => 50],
			],
		],
		'parents_container' => [
			'row1' => [
				'um_rolrol_parent_role_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Role', 'domain' => 'group_id', 'required' => true, 'null' => true, 'details_unique_select' => true, 'percent' => 95, 'method' => 'select', 'options_model' => 'numbers_users_users_model_roles', 'onchange' => 'this.form.submit();'],
				'um_usrrol_inactive' => ['order' => 2, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			]
		],
		'permissions_container' => [
			'row1' => [
				'um_rolperm_resource_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Resource', 'domain' => 'resource_id', 'required' => true, 'null' => true, 'percent' => 50, 'method' => 'select', 'options_model' => 'numbers_users_users_datasource_acl_controllers2::options_groupped', 'options_params' => ['sm_resource_acl_permission' => 1], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();'],
				'um_rolperm_action_id' => ['order' => 2, 'label_name' => 'Action', 'domain' => 'action_id', 'required' => true, 'null' => true, 'percent' => 45, 'method' => 'select', 'options_model' => 'numbers_backend_system_modules_datasource_resource_map::options_json', 'options_depends' => ['sm_rsrcmp_resource_id' => 'um_rolperm_resource_id'], 'tree' => true, 'searchable' => true, 'onchange' => 'this.form.submit();', 'json_contains' => ['action_id' => 'um_rolperm_action_id', 'method_code' => 'um_rolperm_method_code']],
				'um_rolperm_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
			],
			self::hidden => [
				'um_rolperm_method_code' => ['order' => 4, 'Method', 'domain' => 'code', 'required' => true, 'null' => true, 'method' => 'hidden']
			]
		],
		'buttons' => [
			self::buttons => self::buttons_data_group
		]
	];
	public $collection = [
		'model' => 'numbers_users_users_model_roles',
		'details' => [
			'numbers_users_users_model_role_children' => [
				'pk' => ['um_rolrol_tenant_id', 'um_rolrol_parent_role_id', 'um_rolrol_child_role_id'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolrol_tenant_id', 'um_role_id' => 'um_rolrol_child_role_id'],
				'sql' => [
					'where' => [
						'um_rolrol_structure_code' => 'BELONGS_TO'
					]
				]
			],
			'numbers_users_users_model_role_permissions' => [
				'pk' => ['um_rolperm_tenant_id', 'um_rolperm_role_id', 'um_rolperm_resource_id', 'um_rolperm_method_code', 'um_rolperm_action_id'],
				'type' => '1M',
				'map' => ['um_role_tenant_id' => 'um_rolperm_tenant_id', 'um_role_id' => 'um_rolperm_role_id']
			]
		]
	];

	public function validate(& $form) {
		
	}
}