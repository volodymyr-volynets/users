<?php

namespace Numbers\Users\Users\Controller;
class Groups extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new numbers_users_users_form_list_groups([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new numbers_users_users_form_groups([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}