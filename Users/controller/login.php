<?php

namespace Numbers\Users\Users\Controller;
class Login extends \Object\Controller\Public2 {
	public function actionIndex() {
		$form = new numbers_users_users_form_login([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}