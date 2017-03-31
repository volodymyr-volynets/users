<?php

namespace Numbers\Users\Users\Controller;
class Logout extends \Object\Controller\Authorized {
	public function actionIndex() {
		$form = new numbers_users_users_form_logout([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}