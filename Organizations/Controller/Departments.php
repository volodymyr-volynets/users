<?php

namespace Numbers\Users\Organizations\Controller;
class Departments extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Users\Organizations\Form\List2\Departments([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Users\Organizations\Form\Departments([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}