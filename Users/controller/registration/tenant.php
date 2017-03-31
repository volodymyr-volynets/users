<?php

namespace Numbers\Users\Users\Controller\Registration;
class Tenant extends \Object\Controller {
	public function actionIndex() {
		$form = new \Numbers\Users\Users\Form\Registration\Tenant\Collection([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}