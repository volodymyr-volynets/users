<?php

namespace Numbers\Users\Users\Controller\Helper;
class Miniboard extends \Object\Controller\Authorized {
	public function actionIndex() {
		$model = new \Numbers\Users\Users\Helper\Dashboard\Dashboard();
		$model->acl();
		echo $model->render();
	}
}