<?php

namespace Numbers\Users\Users\Controller;
class Titles extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new numbers_users_users_form_list_titles([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new numbers_users_users_form_titles([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}