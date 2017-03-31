<?php

namespace Numbers\Users\Users\Data;
class Import extends \Object\Import {
	public $data = [
		'modules' => [
			'options' => [
				'pk' => ['sm_module_code'],
				'model' => '\Numbers\Backend\System\Modules\Model\Collection\Modules',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_module_code' => 'UM',
					'sm_module_type' => 20,
					'sm_module_name' => 'U/M User Management',
					'sm_module_icon' => 'user-o',
					'sm_module_parent_module_code' => null,
					'sm_module_transactions' => 0,
					'sm_module_multiple' => 0,
					'sm_module_activation_model' => null,
					'sm_module_custom_activation' => false,
					'sm_module_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Module\Dependencies' => []
				]
			]
		],
		'user_types' => [
			'options' => [
				'pk' => ['um_usrtype_id'],
				'model' => '\Numbers\Users\Users\Model\User\Types',
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
		'role_types' => [
			'options' => [
				'pk' => ['um_roltype_id'],
				'model' => '\Numbers\Users\Users\Model\Role\Types',
				'method' => 'save'
			],
			'data' => [
				[
					'um_roltype_id' => 10,
					'um_roltype_name' => 'Abstract Role',
					'um_roltype_inactive' => 0
				],
				[
					'um_roltype_id' => 20,
					'um_roltype_name' => 'Job Role',
					'um_roltype_inactive' => 0
				],
				[
					'um_roltype_id' => 30,
					'um_roltype_name' => 'Duty Role',
					'um_roltype_inactive' => 0
				],
				[
					'um_roltype_id' => 40,
					'um_roltype_name' => 'Data Role',
					'um_roltype_inactive' => 0
				]
			]
		],
		'features' => [
			'options' => [
				'pk' => ['sm_feature_code'],
				'model' => '\Numbers\Backend\System\Modules\Model\Collection\Module\Features',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_feature_module_code' => 'UM',
					'sm_feature_code' => 'UM::RBAC',
					'sm_feature_type' => 10,
					'sm_feature_name' => 'U/M RBAC',
					'sm_feature_icon' => 'user-circle-o',
					'sm_feature_activation_model' => null,
					'sm_feature_activated_by_default' => 1,
					'sm_feature_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Module\Dependencies' => [
						[
							'sm_mdldep_child_module_code' => 'ON',
							'sm_mdldep_child_feature_code' => 'ON::ORGANIZATIONS'
						]
					]
				],
				[
					'sm_feature_module_code' => 'UM',
					'sm_feature_code' => 'UM::USERS',
					'sm_feature_type' => 10,
					'sm_feature_name' => 'U/M Users',
					'sm_feature_icon' => 'users',
					'sm_feature_activated_by_default' => 1,
					'sm_feature_activation_model' => null,
					'sm_feature_inactive' => 0,
					'\Numbers\Backend\System\Modules\Model\Module\Dependencies' => [
						[
							'sm_mdldep_child_module_code' => 'ON',
							'sm_mdldep_child_feature_code' => 'ON::ORGANIZATIONS'
						],
						[
							'sm_mdldep_child_module_code' => 'UM',
							'sm_mdldep_child_feature_code' => 'UM::RBAC'
						]
					]
				],
				[
					'sm_feature_module_code' => 'UM',
					'sm_feature_code' => 'UM::EMAIL_PASSWORD_CHANGED',
					'sm_feature_type' => 20,
					'sm_feature_name' => 'U/M Email Password Changed',
					'sm_feature_icon' => 'envelope-o',
					'sm_feature_activated_by_default' => 1,
					'sm_feature_activation_model' => null,
					'sm_feature_inactive' => 0
				]
			]
		],
	];
}