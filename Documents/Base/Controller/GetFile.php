<?php

namespace Numbers\Users\Documents\Base\Controller;
class GetFile extends \Object\Controller {
	public $title = 'Get File';
	public $skip_monitoring = true;
	public function actionIndex() {
		$input = \Request::input();
		if (empty($input['token'])) {
			Throw new \Exception('Invalid token!');
		} else {
			$crypt = new \Crypt();
			$token_data = $crypt->tokenValidate($input['token']);
			if ($token_data === false || ($token_data['token'] != 'file.view' && $token_data['token'] != 'thumbnail.view')) {
				Throw new \Exception('Invalid token!');
			} else {
				$model = new \Numbers\Users\Documents\Base\Base();
				echo $model->download($token_data['id'], ['thumbnail' => $token_data['token'] == 'thumbnail.view']);
			}
		}
	}
}