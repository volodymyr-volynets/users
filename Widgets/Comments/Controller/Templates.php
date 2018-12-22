<?php

namespace Numbers\Users\Widgets\Comments\Controller;
class Templates extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Users\Widgets\Comments\Form\List2\Templates([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Users\Widgets\Comments\Form\Templates([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionImport() {
		$form = new \Object\Form\Wrapper\Import([
			'model' => '\Numbers\Users\Widgets\Comments\Form\Templates',
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}