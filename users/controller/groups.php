<?php

class numbers_users_users_controller_groups extends object_controller_permission {
	public function action_index() {
		$form = new numbers_users_users_form_list_groups([
			'input' => request::input()
		]);
		echo $form->render();
	}
	public function action_edit() {
		$form = new numbers_users_users_form_groups([
			'input' => request::input()
		]);
		echo $form->render();
	}
}