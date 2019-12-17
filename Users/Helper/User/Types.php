<?php

namespace Numbers\Users\Users\Helper\User;
class Types {

	/**
	 * Validate names based on type
	 *
	 * @param object $form
	 * @param string $column_prefix
	 * @return string
	 */
	public static function validateType(& $form, string $column_prefix) : string {
		// personal type
		if ($form->values[$column_prefix . 'type_id'] == 10) {
			if (empty($form->values[$column_prefix . 'first_name'])) {
				$form->error('danger', \Object\Content\Messages::REQUIRED_FIELD, $column_prefix . 'first_name');
			}
			if (empty($form->values[$column_prefix . 'last_name'])) {
				$form->error('danger', \Object\Content\Messages::REQUIRED_FIELD, $column_prefix . 'last_name');
			}
			$name = concat_ws(' ', $form->values[$column_prefix . 'title'], $form->values[$column_prefix . 'first_name'], $form->values[$column_prefix . 'last_name']);
		} else if ($form->values[$column_prefix . 'type_id'] == 20) { // business
			if (empty($form->values[$column_prefix . 'company'])) {
				$form->error('danger', \Object\Content\Messages::REQUIRED_FIELD, $column_prefix . 'company');
			}
			$name = $form->values[$column_prefix . 'company'];
		}
		return $name;
	}
}