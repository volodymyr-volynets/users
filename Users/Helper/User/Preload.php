<?php

namespace Numbers\Users\Users\Helper\User;
class Preload {

	/**
	 * Preload one user
	 *
	 * @param int $user_id
	 */
	public static function preloadOneUser(int $user_id) {
		if (!empty(\User::$cached_users[$user_id])) return;
		$all_users = \Numbers\Users\Users\DataSource\Login::getStatic([
			'where' => [
				'user_ids' => [$user_id],
			],
			'pk' => ['id'],
			'single_row' => false,
		]);
		\User::$cached_users = array_merge_hard(\User::$cached_users, $all_users);
	}
}