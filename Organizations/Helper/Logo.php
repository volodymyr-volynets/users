<?php

namespace Numbers\Users\Organizations\Helper;
class Logo {

	/**
	 * Get url
	 */
	public static function getURL() {
		if (empty(\I18n::$options['organization_id'])) return;
		//\Numbers\Users\Documents\Base\Base::generateURL($neighbouring_values[$options['options']['preview_file_id']])]
		$organization = \Numbers\Users\Organizations\Model\Organizations::getStatic([
			'where' => [
				'on_organization_id' => \I18n::$options['organization_id']
			],
			'pk' => null
		]);
		if (!empty($organization[0]['on_organization_logo_file_id'])) {
			return \Numbers\Users\Documents\Base\Base::generateURL($organization[0]['on_organization_logo_file_id'], true);
		}
	}
}