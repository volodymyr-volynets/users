<?php

namespace Numbers\Users\Organizations\Helper;
class Logo {

	/**
	 * Get URL
	 */
	public static function getURL() {
		$organizations = \Numbers\Users\Organizations\Model\Organizations::getStatic([
			'pk' => ['on_organization_id']
		]);
		$file_id = null;
		if (count($organizations) == 1) {
			$temp = current($organizations);
			$file_id = $temp['on_organization_logo_file_id'];
		} else if (\User::get('organization_id')) {
			$file_id = $organizations[\User::get('organization_id')]['on_organization_logo_file_id'];
		} else if (\I18n::$options['organization_id']) {
			$file_id = $organizations[\I18n::$options['organization_id']]['on_organization_logo_file_id'];
		}
		if (!empty($file_id)) {
			return \Numbers\Users\Documents\Base\Base::generateURL($file_id, true);
		}
	}

	/**
	 * Get URL
	 */
	public static function getName() {
		$organizations = \Numbers\Users\Organizations\Model\Organizations::getStatic([
			'pk' => ['on_organization_id']
		]);
		if (count($organizations) == 1) {
			$temp = current($organizations);
			return $temp['on_organization_name'];
		} else if (\User::get('organization_id')) {
			return $organizations[\User::get('organization_id')]['on_organization_name'];
		} else if (\I18n::$options['organization_id']) {
			return $organizations[\I18n::$options['organization_id']]['on_organization_name'];
		}
		return ' ';
	}
}