<?php

namespace Numbers\Users\Printing\Controller;
class Headers extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Users\Printing\Form\List2\Headers([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Users\Printing\Form\Headers([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionImport() {
		$form = new \Object\Form\Wrapper\Import([
			'model' => '\Numbers\Users\Printing\Form\Headers',
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}