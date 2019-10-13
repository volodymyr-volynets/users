<?php

namespace Numbers\Users\Widgets\Voters\Controller;
class Types extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Users\Widgets\Voters\Form\List2\Types([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Users\Widgets\Voters\Form\Types([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionImport() {
		$form = new \Object\Form\Wrapper\Import([
			'model' => '\Numbers\Users\Widgets\Voters\Form\Types',
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}