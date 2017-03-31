<?php

namespace Numbers\Users\Users\Controller;
class Users extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new numbers_users_users_form_list_users([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new numbers_users_users_form_users([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}