<?php

namespace Numbers\Users\Users\Controller\APIs;
class Login extends \Object\Controller\API {
	public function actionLogin() {
		$result = \Numbers\Users\Users\Form\APIs\Login::API()->save($this->api_input, ['simple' => true]);
		$this->handleOutput($result);
	}
	public function actionLogout() {
		$result = \Numbers\Users\APIs\Helper\Authorize::signOut($this->api_input['__session_id']);
		$this->handleOutput($result);
	}
	public function actionGetStructure() {
		return '';
	}
}