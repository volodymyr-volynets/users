<?php

namespace Numbers\Users\Users\Helper\Queue;
class Helper {

	/**
	 * Start
	 *
	 * @param string $linked_type
	 * @param int $linked_module_id
	 * @param int $linked_id
	 * @param string $owner_type
	 * @param int $user_id
	 * @return array
	 */
	public static function start(string $linked_type, int $linked_module_id, int $linked_id, string $owner_type, int $user_id) : array {
		$data = \Numbers\Users\Organizations\Model\Queue\OwnerTypes::getStatic([
			'where' => [
				'on_ownertype_code' => $owner_type
			],
			'pk' => null,
			'single_row' => true
		]);
		return \Numbers\Users\Users\Model\Owner\Users::collectionStatic()->merge([
			'um_owneruser_type_id' => $data['on_ownertype_id'],
			'um_owneruser_user_id' => $user_id,
			'um_owneruser_linked_type_code' => $linked_type,
			'um_owneruser_linked_module_id' => $linked_module_id,
			'um_owneruser_linked_id' => $linked_id,
			'um_owneruser_inactive' => 0
		]);
	}
}