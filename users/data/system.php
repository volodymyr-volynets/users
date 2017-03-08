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
					'sm_resource_group1_name' => 'Authorization',
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
					'sm_resource_group1_name' => 'Authorization',
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
					'sm_resource_menu_url' => null,
					'sm_resource_menu_options_generator' => null,
					'sm_resource_inactive' => 0,
					'numbers_backend_system_modules_model_resource_features' => [],
					'numbers_backend_system_modules_model_resource_map' => []
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
				]
			]
		]
	];
}