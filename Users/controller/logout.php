<?php

namespace Numbers\Users\Users\Controller;
class Logout extends \Object\Controller\Authorized {
	public function actionIndex() {
		$form = new \Numbers\Users\Users\Form\Logout([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}