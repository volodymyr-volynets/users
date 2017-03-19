<?php

class numbers_users_users_data_system extends object_import {
	public $data = [
		'controllers' => [
			'options' => [
				'pk' => ['sm_resource_id'],
				'model' => 'numbers_backend_system_modules_model_collection_resources',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_resource_id' => '::id::numbers_users_users_controller_login',
					'sm_resource_code' => 'numbers_users_users_controller_login',
					'sm_resource_type' => 100,
					'sm_resource_name' => 'Sign In',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'sign-in',
					'sm_resource_module_code' => 'UM',
					'sm_resource_group1_name' => 'Account',
					'sm_resource_group2_name' => 'Authorization',
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 1,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 0,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0,
					'numbers_backend_system_modules_model_resource_features' => [],
					'numbers_backend_system_modules_model_resource_map' => []
				],
				[
					'sm_resource_id' => '::id::numbers_users_users_controller_logout',
					'sm_resource_code' => 'numbers_users_users_controller_logout',
					'sm_resource_type' => 100,
					'sm_resource_name' => 'Sign Out',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'sign-out',
					'sm_resource_module_code' => 'UM',
					'sm_resource_group1_name' => 'Account',
					'sm_resource_group2_name' => 'Authorization',
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 1,
					'sm_resource_acl_permission' => 0,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0,
					'numbers_backend_system_modules_model_resource_features' => [],
					'numbers_backend_system_modules_model_resource_map' => []
				],
				[
					'sm_resource_id' => '::id::numbers_users_users_controller_registration_tenant',
					'sm_resource_code' => 'numbers_users_users_controller_registration_tenant',
					'sm_resource_type' => 100,
					'sm_resource_name' => 'Tenant Registration',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'pencil-square-o',
					'sm_resource_module_code' => 'UM',
					'sm_resource_group1_name' => 'Account',
					'sm_resource_group2_name' => 'Registration',
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 1,
					'sm_resource_acl_permission' => 0,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0,
					'numbers_backend_system_modules_model_resource_features' => [],
					'numbers_backend_system_modules_model_resource_map' => []
				],
				[
					'sm_resource_id' => '::id::numbers_users_users_controller_users',
					'sm_resource_code' => 'numbers_users_users_controller_users',
					'sm_resource_type' => 100,
					'sm_resource_name' => 'U/M Users',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'users',
					'sm_resource_module_code' => 'UM',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'User Management',
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0,
					'numbers_backend_system_modules_model_resource_features' => [
						[
							'sm_rsrcftr_feature_code' => 'UM::USERS',
							'sm_rsrcftr_inactive' => 0
						]
					],
					'numbers_backend_system_modules_model_resource_map' => [
						[
							'sm_rsrcmp_method_code' => 'index',
							'sm_rsrcmp_action_id' => '::id::list_view',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'index',
							'sm_rsrcmp_action_id' => '::id::list_export',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_view',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_new',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_edit',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_inactivate',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_delete',
							'sm_rsrcmp_inactive' => 0
						]
					]
				],
				[
					'sm_resource_id' => '::id::numbers_users_users_controller_groups',
					'sm_resource_code' => 'numbers_users_users_controller_groups',
					'sm_resource_type' => 100,
					'sm_resource_name' => 'U/M Groups',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'object-group',
					'sm_resource_module_code' => 'UM',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'User Management',
					'sm_resource_group3_name' => 'Settings',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0,
					'numbers_backend_system_modules_model_resource_features' => [
						[
							'sm_rsrcftr_feature_code' => 'UM::USERS',
							'sm_rsrcftr_inactive' => 0
						]
					],
					'numbers_backend_system_modules_model_resource_map' => [
						[
							'sm_rsrcmp_method_code' => 'index',
							'sm_rsrcmp_action_id' => '::id::list_view',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'index',
							'sm_rsrcmp_action_id' => '::id::list_export',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_view',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_new',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_edit',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_inactivate',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_delete',
							'sm_rsrcmp_inactive' => 0
						]
					]
				],
				[
					'sm_resource_id' => '::id::numbers_users_users_controller_titles',
					'sm_resource_code' => 'numbers_users_users_controller_titles',
					'sm_resource_type' => 100,
					'sm_resource_name' => 'U/M Titles',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'blind',
					'sm_resource_module_code' => 'UM',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'User Management',
					'sm_resource_group3_name' => 'Settings',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0,
					'numbers_backend_system_modules_model_resource_features' => [
						[
							'sm_rsrcftr_feature_code' => 'UM::USERS',
							'sm_rsrcftr_inactive' => 0
						]
					],
					'numbers_backend_system_modules_model_resource_map' => [
						[
							'sm_rsrcmp_method_code' => 'index',
							'sm_rsrcmp_action_id' => '::id::list_view',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'index',
							'sm_rsrcmp_action_id' => '::id::list_export',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_view',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_new',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_edit',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_inactivate',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_delete',
							'sm_rsrcmp_inactive' => 0
						]
					]
				],
				[
					'sm_resource_id' => '::id::numbers_users_users_controller_roles',
					'sm_resource_code' => 'numbers_users_users_controller_roles',
					'sm_resource_type' => 100,
					'sm_resource_name' => 'U/M Roles',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'user-circle-o',
					'sm_resource_module_code' => 'UM',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'User Management',
					'sm_resource_group3_name' => 'Settings',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0,
					'numbers_backend_system_modules_model_resource_features' => [
						[
							'sm_rsrcftr_feature_code' => 'UM::RBAC',
							'sm_rsrcftr_inactive' => 0
						]
					],
					'numbers_backend_system_modules_model_resource_map' => [
						[
							'sm_rsrcmp_method_code' => 'index',
							'sm_rsrcmp_action_id' => '::id::list_view',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'index',
							'sm_rsrcmp_action_id' => '::id::list_export',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_view',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_new',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_edit',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_inactivate',
							'sm_rsrcmp_inactive' => 0
						],
						[
							'sm_rsrcmp_method_code' => 'edit',
							'sm_rsrcmp_action_id' => '::id::record_delete',
							'sm_rsrcmp_inactive' => 0
						]
					]
				]
			]
		],
		'menu' => [
			'options' => [
				'pk' => ['sm_resource_id'],
				'model' => 'numbers_backend_system_modules_model_collection_resources',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_resource_id' => '::id::menu_numbers_users_users_controller_login',
					'sm_resource_code' => 'menu_numbers_users_users_controller_login',
					'sm_resource_type' => 210,
					'sm_resource_name' => 'Sign In',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'sign-in',
					'sm_resource_module_code' => 'UM',
					'sm_resource_group1_name' => 'Account',
					'sm_resource_group2_name' => null,
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 1,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 0,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => '/numbers/users/users/controller/login',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::menu_numbers_users_users_controller_logout',
					'sm_resource_code' => 'menu_numbers_users_users_controller_logout',
					'sm_resource_type' => 210,
					'sm_resource_name' => 'Sign Out',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'sign-out',
					'sm_resource_module_code' => 'UM',
					'sm_resource_group1_name' => 'Account',
					'sm_resource_group2_name' => null,
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 1,
					'sm_resource_acl_permission' => 0,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => '/numbers/users/users/controller/logout',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::menu_numbers_users_users_controller_registration_tenant',
					'sm_resource_code' => 'menu_numbers_users_users_controller_registration_tenant',
					'sm_resource_type' => 210,
					'sm_resource_name' => 'Tenant Registration',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'pencil-square-o',
					'sm_resource_module_code' => 'UM',
					'sm_resource_group1_name' => 'Account',
					'sm_resource_group2_name' => null,
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 1,
					'sm_resource_acl_authorized' => 1,
					'sm_resource_acl_permission' => 0,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => '/numbers/users/users/controller/registration/tenant',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::menu_operations_user_management',
					'sm_resource_code' => 'menu_operations_user_management',
					'sm_resource_type' => 299,
					'sm_resource_name' => 'User Management',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'user-o',
					'sm_resource_module_code' => 'UM',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => null,
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 0,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::menu_numbers_users_users_controller_users',
					'sm_resource_code' => 'menu_numbers_users_users_controller_users',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'Users',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'users',
					'sm_resource_module_code' => 'UM',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'User Management',
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => '::id::numbers_users_users_controller_users',
					'sm_resource_menu_acl_method_code' => 'index',
					'sm_resource_menu_acl_action_id' => '::id::list_view',
					'sm_resource_menu_url' => '/numbers/users/users/controller/users',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::menu_numbers_users_users_controller_groups',
					'sm_resource_code' => 'menu_numbers_users_users_controller_groups',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'Groups',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'object-group',
					'sm_resource_module_code' => 'UM',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'User Management',
					'sm_resource_group3_name' => 'Settings',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => '::id::numbers_users_users_controller_groups',
					'sm_resource_menu_acl_method_code' => 'index',
					'sm_resource_menu_acl_action_id' => '::id::list_view',
					'sm_resource_menu_url' => '/numbers/users/users/controller/groups',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::menu_numbers_users_users_controller_titles',
					'sm_resource_code' => 'menu_numbers_users_users_controller_titles',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'Titles',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'blind',
					'sm_resource_module_code' => 'UM',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'User Management',
					'sm_resource_group3_name' => 'Settings',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => '::id::numbers_users_users_controller_titles',
					'sm_resource_menu_acl_method_code' => 'index',
					'sm_resource_menu_acl_action_id' => '::id::list_view',
					'sm_resource_menu_url' => '/numbers/users/users/controller/titles',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
				[
					'sm_resource_id' => '::id::menu_operations_user_management_settings',
					'sm_resource_code' => 'menu_operations_user_management_settings',
					'sm_resource_type' => 299,
					'sm_resource_name' => 'Settings',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'cogs',
					'sm_resource_module_code' => 'UM',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'User Management',
					'sm_resource_group3_name' => null,
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 0,
					'sm_resource_menu_acl_resource_id' => null,
					'sm_resource_menu_acl_method_code' => null,
					'sm_resource_menu_acl_action_id' => null,
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
[
					'sm_resource_id' => '::id::menu_numbers_users_users_controller_roles',
					'sm_resource_code' => 'menu_numbers_users_users_controller_roles',
					'sm_resource_type' => 200,
					'sm_resource_name' => 'Roles',
					'sm_resource_description' => null,
					'sm_resource_icon' => 'user-circle-o',
					'sm_resource_module_code' => 'UM',
					'sm_resource_group1_name' => 'Operations',
					'sm_resource_group2_name' => 'User Management',
					'sm_resource_group3_name' => 'Settings',
					'sm_resource_group4_name' => null,
					'sm_resource_group5_name' => null,
					'sm_resource_group6_name' => null,
					'sm_resource_group7_name' => null,
					'sm_resource_group8_name' => null,
					'sm_resource_group9_name' => null,
					'sm_resource_acl_public' => 0,
					'sm_resource_acl_authorized' => 0,
					'sm_resource_acl_permission' => 1,
					'sm_resource_menu_acl_resource_id' => '::id::numbers_users_users_controller_roles',
					'sm_resource_menu_acl_method_code' => 'index',
					'sm_resource_menu_acl_action_id' => '::id::list_view',
					'sm_resource_menu_url' => '/numbers/users/users/controller/roles',
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0
				],
			]
		]
	];
}