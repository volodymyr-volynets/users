<?php

class numbers_users_users_controller_users extends object_controller_permission {
	public function action_index() {
		$form = new numbers_users_users_form_list_users([
			'input' => request::input()
		]);
		echo $form->render();
	}
	public function action_edit() {
		$form = new numbers_users_users_form_users([
			'input' => request::input()
		]);
		echo $form->render();
	}
}