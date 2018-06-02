<?php

namespace Numbers\Users\Users\APIs\Users;
class Groups extends \Numbers\Users\APIs\Abstract2\API{

	public $instructions = [
		'read' => [
			'input' => [
				'__session_id' => ['name' => 'Session #', 'domain' => 'code', 'required' => true],
				'__form' => ['name' => 'Groups Form', 'model' => '\Numbers\Users\Users\Form\Groups'],
			],
			'output' => [
				'success' => ['name' => 'Success', 'type' => 'boolean'],
				'error' => ['name' => 'Error(s)', 'type' => 'array'],
				'data' => ['name' => 'Data', 'type' => 'array'],
			]
		],
//		'delete' => [
//			'input' => [
//				'__session_id' => ['name' => 'Session #', 'domain' => 'code', 'required' => true],
//			],
//			'output' => [
//				'success' => ['name' => 'Success', 'type' => 'boolean'],
//				'error' => ['name' => 'Error(s)', 'type' => 'array'],
//			]
//		]
	];

	public function actionCreate($input) {
		//return \Numbers\Users\APIs\Helper\Authorize::authorizeWithCredentials($input['ua_apiusr_login_username'], $input['ua_apiusr_login_password']);
	}
	public function actionRead($input) {
		
	}
	public function actionUpdate($input) {
		//return \Numbers\Users\APIs\Helper\Authorize::authorizeWithCredentials($input['ua_apiusr_login_username'], $input['ua_apiusr_login_password']);
	}
	public function actionDelete($input) {
		//return \Numbers\Users\APIs\Helper\Authorize::signOut($input['__session_id']);
	}
}