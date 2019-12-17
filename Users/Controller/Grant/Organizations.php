<?php

namespace Numbers\Users\Users\Controller\Grant;
class Organizations extends \Object\Controller\Permission {
	public function actionEdit() {
		$form = new \Numbers\Users\Users\Form\Grant\GrantOrganizations([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}