<?php

namespace Numbers\Users\Organizations\Controller\Organization;
class Types extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Users\Organizations\Form\List2\Types([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Users\Organizations\Form\Types([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}