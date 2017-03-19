<?php

class numbers_users_users_datasource_acl_menu_permissions {

	/**
	 * Get
	 *
	 * @param array $options
	 * @return array
	 */
	public function get(array $options = []) : array {
		$datasource = new numbers_users_users_datasource_acl_menu();
		$data = $datasource->get();
		$result = [];
		foreach ($data as $k => $v) {
			// handle permission
			if ($v['type'] !== 299) {
				if (!empty($v['acl_permission'])) {

				} else { // public & authorized
					if (user::authorized()) {
						if (empty($v['acl_authorized'])) continue;
					} else {
						if (empty($v['acl_public'])) continue;
					}
				}
			}
			// add item to the list
			$key = [$v['type']];
			for ($i = 1; $i <= 9; $i++) {
				if (empty($v['group' . $i])) break;
				$key[] = $v['group' . $i];
				// check if group exists
				$existing = array_key_get($result, $key);
				if (empty($existing)) {
					// grab icon & title
					$group = [];
					if ($v['type'] !== 299) {
						$key2 = $key;
						array_shift($key2);
						array_unshift($key2, 299);
						$group = array_key_get($result, $key2);
						if (!empty($group)) {
							$group['options'] = [];
						}
					}
					if (empty($group)) {
						$group = [
							'name' => $v['group' . $i],
							'title' => null,
							'icon' => null,
							'options' => []
						];
					}
					array_key_set($result, $key, $group);
				}
				$key[] = 'options';
			}
			$key[] = $v['name'];
			$item = [
				'name' => $v['name'],
				'title' => $v['description'],
				'icon' => $v['icon'],
				'url' => $v['url']
			];
			$existing = array_key_get($result, $key);
			if (!empty($existing)) {
				$existing = array_merge($existing, $item);
			} else {
				$existing = $item;
				$existing['options'] = [];
			}
			array_key_set($result, $key, $existing);
		}
		return $result;
	}
}