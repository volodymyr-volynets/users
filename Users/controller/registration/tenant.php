<?php

namespace Numbers\Users\Users\Controller\Registration;
class Tenant extends \Object\Controller {
	public function actionIndex() {
		$form = new numbers_users_users_form_registration_tenant_collection([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}