<?php

namespace Numbers\Users\Users\Controller\Report\Security;
class TeamSetupReport extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Users\Users\Form\Report\Security\TeamSetupReport([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}