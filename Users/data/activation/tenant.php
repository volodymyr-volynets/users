<?php

namespace Numbers\Users\Users\Data\Activation;
class Tenant extends \Object\Import {
	public $data = [
		'structure_types' => [
			'options' => [
				'pk' => ['tm_structure_code'],
				'model' => '\Numbers\Tenants\Tenants\Model\Structure\Types',
				'method' => 'save_insert_new'
			],
			'data' => [
				[
					'tm_structure_code' => 'BELONGS_TO',
					'tm_structure_name' => 'Belongs To',
					'tm_structure_inactive' => 0
				],
				[
					'tm_structure_code' => 'OWNER',
					'tm_structure_name' => 'Owner',
					'tm_structure_inactive' => 0
				]
			]
		],
		'roles' => [
			'options' => [
				'pk' => ['um_role_code'],
				'model' => '\Numbers\Users\Users\Model\Roles',
				'method' => 'save_insert_new'
			],
			'data' => [
				[
					'um_role_code' => 'SA',
					'um_role_type_id' => 20,
					'um_role_name' => 'Super Administrator',
					'um_role_global' => 1,
					'um_role_super_admin' => 1,
					'um_role_icon' => 'user-secret',
					'um_role_inactive' => 0
				]
			]
		],
		'titles' => [
			'options' => [
				'pk' => ['um_usrtitle_name'],
				'model' => '\Numbers\Users\Users\Model\User\Titles',
				'method' => 'save_insert_new'
			],
			'data' => [
				[
					'um_usrtitle_name' => 'Mr.',
					'um_usrtitle_order' => 1000,
					'um_usrtitle_inactive' => 0
				],
				[
					'um_usrtitle_name' => 'Ms.',
					'um_usrtitle_order' => 1100,
					'um_usrtitle_inactive' => 0
				],
				[
					'um_usrtitle_name' => 'Mrs.',
					'um_usrtitle_order' => 1200,
					'um_usrtitle_inactive' => 0
				],
				[
					'um_usrtitle_name' => 'Miss',
					'um_usrtitle_order' => 1300,
					'um_usrtitle_inactive' => 0
				],
				[
					'um_usrtitle_name' => 'Dr.',
					'um_usrtitle_order' => 1500,
					'um_usrtitle_inactive' => 0
				]
			]
		]
	];
}