<?php

namespace Numbers\Users\APIs\Controller;
class BearerTokens extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Users\APIs\Form\List2\BearerTokens([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Users\APIs\Form\BearerTokens([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}