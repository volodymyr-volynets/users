<?php

class numbers_users_users_data_import extends object_import {
	public $data = [
		'modules' => [
			'options' => [
				'pk' => ['sm_module_code'],
				'model' => 'numbers_backend_system_modules_model_collection_modules',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_module_code' => 'UM',
					'sm_module_type' => 20,
					'sm_module_name' => 'U/M User Management',
					'sm_module_parent_module_code' => null,
					'sm_module_transactions' => 0,
					'sm_module_multiple' => 0,
					'sm_module_activation_model' => null,
					'sm_module_custom_activation' => false,
					'sm_module_inactive' => 0,
					'numbers_backend_system_modules_model_module_dependencies' => []
				]
			]
		],
		'user_types' => [
			'options' => [
				'pk' => ['um_usrtype_id'],
				'model' => 'numbers_users_users_model_user_types',
				'method' => 'save_insert_new'
			],
			'data' => [
				[
					'um_usrtype_id' => 10,
					'um_usrtype_name' => 'Personal',
					'um_usrtype_inactive' => 0
				],
				[
					'um_usrtype_id' => 20,
					'um_usrtype_name' => 'Business',
					'um_usrtype_inactive' => 0
				]
			]
		],
		'features' => [
			'options' => [
				'pk' => ['sm_feature_code'],
				'model' => 'numbers_backend_system_modules_model_collection_module_features',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_feature_module_code' => 'UM',
					'sm_feature_code' => 'UM::USERS',
					'sm_feature_type' => 10,
					'sm_feature_name' => 'U/M Users',
					'sm_feature_activation_model' => null,
					'sm_feature_inactive' => 0,
					'numbers_backend_system_modules_model_module_dependencies' => [
						[
							'sm_mdldep_child_module_code' => 'ON',
							'sm_mdldep_child_feature_code' => 'ON::ORGANIZATIONS'
						]
					]
				],
			]
		],
	];
}