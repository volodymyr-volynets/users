<?php

class numbers_users_users_data_activation_tenant extends object_import {
	public $data = [
		'structure_types' => [
			'options' => [
				'pk' => ['tm_structure_code'],
				'model' => 'numbers_tenants_tenants_model_structure_types',
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
		]
	];
}