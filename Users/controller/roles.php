<?php

namespace Numbers\Users\Users\Controller;
class Roles extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new numbers_users_users_form_list_roles([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new numbers_users_users_form_roles([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}