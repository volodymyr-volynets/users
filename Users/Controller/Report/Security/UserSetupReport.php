<?php

namespace Numbers\Users\Users\Controller\Report\Security;
class UserSetupReport extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Users\Users\Form\Report\Security\UserSetupReport([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}