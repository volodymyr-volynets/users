<?php

namespace Numbers\Users\Documents\Base\Controller\File;
class Types extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Users\Documents\Base\Form\List2\File\Types([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Users\Documents\Base\Form\File\Types([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionImport() {
		$form = new \Object\Form\Wrapper\Import([
			'model' => '\Numbers\Users\Documents\Base\Form\File\Types',
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}