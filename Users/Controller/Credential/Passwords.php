<?php

namespace Numbers\Users\Users\Controller\Credential;
class Passwords extends \Object\Controller\Permission {
	public function actionIndex() {
		$input = \Request::input();
		if (\Numbers\Users\Users\Helper\ReLogin::reLoginActive(\Application::get('mvc.controller'), $input)) {
			$form = new \Numbers\Users\Users\Form\List2\Credential\Passwords([
				'input' => $input,
			]);
			echo $form->render();
		}
	}
	public function actionEdit() {
		$input = \Request::input();
		if (\Numbers\Users\Users\Helper\ReLogin::reLoginActive(\Application::get('mvc.controller'), $input)) {
			$form = new \Numbers\Users\Users\Form\Credential\Passwords([
				'input' => $input,
			]);
			echo $form->render();
		}
	}
}