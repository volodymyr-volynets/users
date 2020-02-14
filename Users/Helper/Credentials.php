<?php

namespace Numbers\Users\Users\Helper;
class Credentials {

	/**
	 * Load credentials and decrypt
	 *
	 * @param string $password_code
	 * @return array
	 */
	public static function loadCredentials(string $password_code) : array {
		$result = [
			'success' => false,
			'error' => [],
			'data' => []
		];
		$values = \Numbers\Users\Users\Model\Credential\Password\Values::getStatic([
			'where' => [
				'um_passwval_password_code' => $password_code,
			],
			'pk' => ['um_passwval_name']
		]);
		$crypt = new \Crypt();
		foreach ($values as $k => $v) {
			$result['data'][$k] = $crypt->decrypt($v['um_passwval_encrypted_password']);
		}
		return $result;
	}
}