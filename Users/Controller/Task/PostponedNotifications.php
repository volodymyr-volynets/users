<?php

namespace Numbers\Users\Users\Controller\Task;
class PostponedNotifications extends \Object\Controller\Permission {
	public function actionEdit() {
		$form = new \Numbers\Users\Users\Form\Task\PostponedNotifications([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}