<?php

class numbers_users_users_controller_registration_tenant extends object_controller {
	public function action_index() {
		$form = new numbers_users_users_form_registration_tenant_collection([
			'input' => request::input()
		]);
		echo $form->render();
	}
}