<?php

namespace Numbers\Users\APIs\Controller;
class APIResources extends \Object\Controller\Permission {
	public function actionIndex() {
		// we need to set 100% width
		\Object\Controller::$main_content_class = 'container-fluid';
		// render pages
		$input = \Request::input();
		$hash = \Application::get('mvc.hash_parts');
		if (!empty($hash)) {
			$input['sm_resource_module_code'] = $hash[1];
			$input['sm_resource_version_code'] = $hash[2];
			$input['sm_resource_id'] = $hash[3];
		}
		$form = new \Numbers\Users\APIs\Form\APIResources\Collection([
			'input' => $input,
		]);
		echo $form->render();
	}
}