<?php

namespace Numbers\Users\Documents\Base\Helper;
class Preview {

	/**
	 * Preview
	 *
	 * @param object $form
	 * @param array $options
	 * @param mixed $value
	 * @param array $neighbouring_values
	 * @return string
	 */
	public function renderPreview(& $form, & $options, & $value, & $neighbouring_values) {
		if (!empty($neighbouring_values[$options['options']['preview_file_id']])) {
			return '<div>' . \HTML::img(['src' => \Numbers\Users\Documents\Base\Base::generateURL($neighbouring_values[$options['options']['preview_file_id']])]) . '</div>';
		} else {
			return '';
		}
	}
}