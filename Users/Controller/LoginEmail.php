<?php

namespace Numbers\Users\Users\Controller;
class LoginEmail extends \Object\Controller {
	public function actionIndex() {
		$input = \Request::input();
		// if logged in
		if (\User::authorized()) {
			if (!empty($input['email_token'])) {
				$crypt = new \Crypt();
				$token_data = $crypt->tokenVerify($input['email_token'] ?? '', ['email.link']);
				if ($token_data !== false) {
					$token_data['data'] = json_decode($token_data['data'], true);
					$_SESSION['numbers']['tokens']['email_token'] = $token_data;
				}
			}
			// link from email
			if (!empty($_SESSION['numbers']['tokens']['email_token'])) {
				$href = $_SESSION['numbers']['tokens']['email_token']['data']['href'];
				unset($_SESSION['numbers']['tokens']['email_token']['data']['href']);
				\Request::redirect($href);
			}
		} else {
			if (!empty($input['email_token'])) {
				$crypt = new \Crypt();
				$token_data = $crypt->tokenVerify($input['email_token'] ?? '', ['email.link']);
				if ($token_data !== false) {
					$token_data['data'] = json_decode($token_data['data'], true);
					$_SESSION['numbers']['tokens']['email_token'] = $token_data;
				}
			}
			$form = new \Numbers\Users\Users\Form\Login([
				'input' => $input,
				'no_ajax_form_reload' => true
			]);
			echo $form->render();
		}
	}
}