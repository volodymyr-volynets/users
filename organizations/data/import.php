<?php

class numbers_users_organizations_data_import extends object_import {
	public $data = [
		'modules' => [
			'options' => [
				'pk' => ['sm_module_code'],
				'model' => 'numbers_backend_system_modules_model_collection_modules',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_module_code' => 'ON',
					'sm_module_type' => 20,
					'sm_module_name' => 'O/N Organizations',
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
		'features' => [
			'options' => [
				'pk' => ['sm_feature_code'],
				'model' => 'numbers_backend_system_modules_model_collection_module_features',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_feature_module_code' => 'ON',
					'sm_feature_code' => 'ON::ORGANIZATIONS',
					'sm_feature_type' => 10,
					'sm_feature_name' => 'O/N Organizations',
					'sm_feature_activation_model' => null,
					'sm_feature_inactive' => 0,
					'numbers_backend_system_modules_model_module_dependencies' => []
				],
			]
		],
	];
}