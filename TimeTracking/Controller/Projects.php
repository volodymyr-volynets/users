<?php

namespace Numbers\Users\TimeTracking\Controller;
class Projects extends \Object\Controller\Authorized {
	public function actionIndex() {
		$input = \Request::input();
		$input['tt_project_user_id1'] = \User::id();
		$form = new \Numbers\Users\TimeTracking\Form\List2\Projects([
			'input' => $input
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$input = \Request::input();
		$input['tt_project_user_id'] = \User::id();
		$form = new \Numbers\Users\TimeTracking\Form\Projects([
			'input' => $input
		]);
		echo $form->render();
	}
	public function actionImport() {
		$form = new \Object\Form\Wrapper\Import([
			'model' => '\Numbers\Users\TimeTracking\Form\Projects',
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}