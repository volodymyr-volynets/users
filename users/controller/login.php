<?php

class numbers_users_users_controller_login extends object_controller_public {
	public function action_index() {
		$form = new numbers_users_users_form_login([
			'input' => request::input()
		]);
		echo $form->render();
	}
}