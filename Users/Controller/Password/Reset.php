<?php

namespace Numbers\Users\Users\Controller\Password;
class Reset extends \Object\Controller {
	public function actionIndex() {
		$form = new \Numbers\Users\Users\Form\Login([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}