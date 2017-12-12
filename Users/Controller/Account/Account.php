<?php

namespace Numbers\Users\Users\Controller\Account;
class Account extends \Object\Controller {
	public function actionJsonMenuName() {
		if (\User::authorized()) {
			if (\User::get('photo_file_id')) {
				$avatar = \Numbers\Users\Documents\Base\Base::generateURL(\User::get('photo_file_id'), true);
			} else {
				$avatar = null;
			}
			\Layout::renderAs([
				'success' => true,
				'error' => [],
				'data' => \User::get('name'),
				'item' => \Request::input('item'),
				'avatar' => $avatar
			], 'application/json');
		} else {
			\Layout::renderAs([
				'success' => false,
				'error' => [],
				'data' => null,
				'item' => null,
				'avatar' => null
			], 'application/json');
		}
	}
}