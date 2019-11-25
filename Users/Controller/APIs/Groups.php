<?php

namespace Numbers\Users\Users\Controller\APIs;
class Groups extends \Object\Controller\API {
	public function actionGet($options) {
		$result = \Numbers\Users\Users\Form\Groups::API()->get($this->api_input);
		$this->handleOutput($result);
	}
	public function actionSave($options) {
		$result = \Numbers\Users\Users\Form\Groups::API()->save($this->api_input);
		$this->handleOutput($result);
	}
	public function actionDelete($options) {
		$result = \Numbers\Users\Users\Form\Groups::API()->delete($this->api_input);
		$this->handleOutput($result);
	}
	public function actionGetStructure() {
		return '';
	}
}