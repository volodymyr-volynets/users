<?php

namespace Numbers\Users\Users\Controller;
class Groups extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Users\Users\Form\List2\Groups([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Users\Users\Form\Groups([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}