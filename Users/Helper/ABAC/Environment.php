<?php

namespace Numbers\Users\Users\Helper\ABAC;
class Environment {

	/**
	 * Get user and children
	 */
	public function getUserWithChildren(int $user_id = 0) {
		if (empty($user_id)) {
			$user_id = \User::id();
		}
		$model = new \Numbers\Users\Users\DataSource\User\UserToUser();
		return $model->get([
			'where' => [
				'user_id' => $user_id
			]
		]);
	}
}