<?php

namespace Numbers\Users\Documents\Drivers\Amazon\Controller;
class Profiles extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Users\Documents\Drivers\Amazon\Form\List2\Profiles([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Users\Documents\Drivers\Amazon\Form\Profiles([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionImport() {
		$form = new \Object\Form\Wrapper\Import([
			'model' => '\Numbers\Users\Documents\Drivers\Amazon\Form\Profiles',
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}