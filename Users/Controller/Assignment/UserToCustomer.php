<?php

namespace Numbers\Users\Users\Controller\Assignment;
class UserToCustomer extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Users\Users\Form\List2\Assignment\UserToCustomer([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Users\Users\Form\Assignment\UserToCustomer([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionImport() {
		$form = new \Object\Form\Wrapper\Import([
			'model' => '\Numbers\Users\Users\Form\Assignment\UserToCustomer',
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}