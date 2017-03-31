<?php

namespace Numbers\Users\Users\Controller;
class Titles extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Users\Users\Form\List2\Titles([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Users\Users\Form\Titles([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}