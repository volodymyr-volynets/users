<?php

namespace Numbers\Users\Users\Controller\Assignment;
class Types extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Users\Users\Form\List2\Assignment\Types([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Users\Users\Form\Assignment\Types([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}