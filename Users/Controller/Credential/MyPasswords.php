<?php

namespace Numbers\Users\Users\Controller\Credential;
class MyPasswords extends \Object\Controller\Permission {
	public function actionIndex() {
		$input = \Request::input();
		if (\Numbers\Users\Users\Helper\ReLogin::reLoginActive(\Application::get('mvc.controller'), $input)) {
			$form = new \Numbers\Users\Users\Form\List2\Credential\MyPasswords([
				'input' => $input,
			]);
			echo $form->render();
		}
	}
	public function actionEdit() {
		$input = \Request::input();
		if (\Numbers\Users\Users\Helper\ReLogin::reLoginActive(\Application::get('mvc.controller'), $input)) {
			$form = new \Numbers\Users\Users\Form\Credential\MyPasswords([
				'input' => $input,
			]);
			echo $form->render();
		}
	}
}