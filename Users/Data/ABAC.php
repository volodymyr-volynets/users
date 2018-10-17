<?php

namespace Numbers\Users\Users\Data;
class ABAC extends \Object\Import {
	public $data = [
		'abac_attributes' => [
			'options' => [
				'pk' => ['sm_abacattr_id'],
				'model' => '\Numbers\Backend\ABAC\Model\Attributes',
				'method' => 'save'
			],
			'data' => [
				[
					'sm_abacattr_id' => '::id::um_user_id',
					'sm_abacattr_code' => 'um_user_id',
					'sm_abacattr_name' => 'User #',
					'sm_abacattr_module_code' => 'UM',
					'sm_abacattr_parent_abacattr_id' => null,
					'sm_abacattr_tenant' => 1,
					'sm_abacattr_module' => 0,
					'sm_abacattr_flag_abac' => 1,
					'sm_abacattr_flag_assingment' => 1,
					'sm_abacattr_flag_attribute' => 1,
					'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Users\Model\Users',
					'sm_abacattr_domain' => '::from::columns::um_user_id::domain',
					'sm_abacattr_type' => '::from::columns::um_user_id::type',
					'sm_abacattr_is_numeric_key' => '::from::columns::um_user_id::is_numeric_key',
					'sm_abacattr_inactive' => 0
				],
				[
					'sm_abacattr_id' => '::id::um_role_id',
					'sm_abacattr_code' => 'um_role_id',
					'sm_abacattr_name' => 'Role #',
					'sm_abacattr_module_code' => 'UM',
					'sm_abacattr_parent_abacattr_id' => null,
					'sm_abacattr_tenant' => 1,
					'sm_abacattr_module' => 0,
					'sm_abacattr_flag_abac' => 1,
					'sm_abacattr_flag_assingment' => 1,
					'sm_abacattr_flag_attribute' => 1,
					'sm_abacattr_model_id' => '::primary_model::\Numbers\Users\Users\Model\Roles',
					'sm_abacattr_domain' => '::from::columns::um_role_id::domain',
					'sm_abacattr_type' => '::from::columns::um_role_id::type',
					'sm_abacattr_is_numeric_key' => '::from::columns::um_role_id::is_numeric_key',
					'sm_abacattr_inactive' => 0
				]
			]
		],
	];
}