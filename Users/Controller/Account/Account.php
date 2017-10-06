<?php

namespace Numbers\Users\Users\Controller\Account;
class Account extends \Object\Controller {
	public function actionJsonMenuName() {
		if (\User::authorized()) {
			\Layout::renderAs([
				'success' => true,
				'error' => [],
				'data' => \User::get('name'),
				'item' => \Request::input('item')
			], 'application/json');
		} else {
			\Layout::renderAs([
				'success' => false,
				'error' => [],
				'data' => null,
				'item' => null
			], 'application/json');
		}
	}
}