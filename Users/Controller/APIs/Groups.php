<?php

namespace Numbers\Users\Users\Controller\APIs;
class Groups extends \Object\Controller\API {
	public function actionGet() {
		$result = \Numbers\Users\Users\Form\Groups::API()->get($this->api_input, ['simple' => true, 'method' => 'Get']);
		$this->handleOutput($result);
	}
	public function actionSave() {
		$result = \Numbers\Users\Users\Form\Groups::API()->save($this->api_input, ['simple' => true]);
		$this->handleOutput($result);
	}
	public function actionDelete() {
		$result = \Numbers\Users\Users\Form\Groups::API()->delete($this->api_input, ['simple' => true]);
		$this->handleOutput($result);
	}
	public function actionGetStructure() {
		return '';
	}
}