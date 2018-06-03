<?php

namespace Numbers\Users\Users\APIs\User;
class Groups extends \Numbers\Users\APIs\Abstract2\API{

	public $instructions = [
		'read' => [
			'input' => [
				'__session_id' => ['name' => 'Session #', 'domain' => 'code', 'required' => true],
				'um_usrgrp_id' => ['name' => 'Group #', 'domain' => 'group_id', 'required' => true],
			],
			'output' => [
				'success' => ['name' => 'Success', 'type' => 'boolean'],
				'error' => ['name' => 'Error(s)', 'type' => 'array'],
				'data' => ['name' => 'Data', 'type' => 'array'],
			]
		],
		'create' => [
			'input' => [
				'__session_id' => ['name' => 'Session #', 'domain' => 'code', 'required' => true],
			],
			'output' => [
				'success' => ['name' => 'Success', 'type' => 'boolean'],
				'error' => ['name' => 'Error(s)', 'type' => 'array'],
				'data' => ['name' => 'Data', 'type' => 'array'],
			]
		],
		'update' => [
			'input' => [
				'__session_id' => ['name' => 'Session #', 'domain' => 'code', 'required' => true],
			],
			'output' => [
				'success' => ['name' => 'Success', 'type' => 'boolean'],
				'error' => ['name' => 'Error(s)', 'type' => 'array'],
				'data' => ['name' => 'Data', 'type' => 'array'],
			]
		],
		'delete' => [
			'input' => [
				'__session_id' => ['name' => 'Session #', 'domain' => 'code', 'required' => true],
				'um_usrgrp_id' => ['name' => 'Group #', 'domain' => 'group_id', 'required' => true],
			],
			'output' => [
				'success' => ['name' => 'Success', 'type' => 'boolean'],
				'error' => ['name' => 'Error(s)', 'type' => 'array'],
			]
		]
	];

	public function actionCreate($input) {
		$temp = \Numbers\Users\Users\Form\Groups::API()->insert($input);
		return [
			'success' => $temp['success'],
			'error' => $temp['error'],
			'data' => $temp['values']
		];
	}

	public function actionRead($input) {
		$temp = \Numbers\Users\Users\Form\Groups::API()->get($input);
		if ($temp['values_loaded']) {
			return [
				'success' => true,
				'error' => [],
				'data' => $temp['values']
			];
		} else {
			return [
				'success' => false,
				'error' => $temp['error'],
				'data' => []
			];
		}
	}

	public function actionUpdate($input) {
		$temp = \Numbers\Users\Users\Form\Groups::API()->update($input);
		return [
			'success' => $temp['success'],
			'error' => $temp['error'],
			'data' => $temp['values']
		];
	}

	public function actionDelete($input) {
		$temp = \Numbers\Users\Users\Form\Groups::API()->delete($input);
		return [
			'success' => $temp['success'],
			'error' => $temp['error'],
		];
	}
}