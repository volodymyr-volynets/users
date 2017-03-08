<?php

class numbers_users_users_controller_logout extends object_controller_authorized {
	public function action_index() {
		$form = new numbers_users_users_form_logout([
			'input' => request::input()
		]);
		echo $form->render();
	}
}