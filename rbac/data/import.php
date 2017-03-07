<?php

class numbers_users_rbac_data_import extends object_import {
	public $data = [
		'role_types' => [
			'options' => [
				'pk' => ['rc_roltype_id'],
				'model' => 'numbers_users_rbac_model_role_types',
				'method' => 'save'
			],
			'data' => [
				[
					'rc_roltype_id' => 10,
					'rc_roltype_name' => 'Abstract Role',
					'rc_roltype_inactive' => 0
				],
				[
					'rc_roltype_id' => 20,
					'rc_roltype_name' => 'Job Role',
					'rc_roltype_inactive' => 0
				],
				[
					'rc_roltype_id' => 30,
					'rc_roltype_name' => 'Duty Role',
					'rc_roltype_inactive' => 0
				],
				[
					'rc_roltype_id' => 40,
					'rc_roltype_name' => 'Data Role',
					'rc_roltype_inactive' => 0
				]
			]
		]
	];
}