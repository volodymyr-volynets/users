<?php

namespace Numbers\Users\Widgets\Ingestions\Helper;
class Locks {

	/**
	 * Is locked
	 *
	 * @param string $link
	 * @param int $uid
	 * @param string $interval
	 * @return bool
	 */
	public static function isLocked(string $link, int $uid, string $interval = '-30 days') : bool {
		$result = \Numbers\Users\Widgets\Ingestions\Model\Locks::getStatic([
			'where' => [
				'wg_emailinglock_link' => $link,
				'wg_emailinglock_uid' => $uid,
				'wg_emailinglock_timestamp;>' => \Helper\Date::addInterval(\Format::now('date'), $interval),
			],
			'pk' => null,
		]);
		return !empty($result[0]);
	}

	/**
	 * Lock
	 *
	 * @param string $link
	 * @param int $uid
	 * @return bool
	 */
	public static function lock(string $link, int $uid) : bool {
		$result = \Numbers\Users\Widgets\Ingestions\Model\Locks::collectionStatic()->merge([
			'wg_emailinglock_link' => $link,
			'wg_emailinglock_uid' => $uid,
			'wg_emailinglock_timestamp' => \Format::now('timestamp'),
		]);
		return $result['success'];
	}
}