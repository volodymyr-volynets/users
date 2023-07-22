<?php

namespace Numbers\Users\Printing\Controller;
class Templates extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Users\Printing\Form\List2\Templates([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Users\Printing\Form\Templates([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionImport() {
		$form = new \Object\Form\Wrapper\Import([
			'model' => '\Numbers\Users\Printing\Form\Templates',
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionActivate() {
		$form = new \Numbers\Users\Printing\Form\Template\CreateVersion([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}