<?php

namespace Numbers\Users\Documents\Base\Validator;
class Files extends \Object\Validator\Base {

	/**
	 * @see \Object\Validator\Base::validate()
	 */
	public function validate($value, $options = []) {
		$result = $this->result;
		if (is_null($value) || empty($value)) {
			$result['success'] = true;
			return $result;
		}
		$model = new \Numbers\Users\Documents\Base\Helper\Validate();
		// if we have multiple files
		if (!array_key_exists('tmp_name', $value)) {
			foreach ($value as $v) {
				if (!array_key_exists('tmp_name', $v)) {
					continue;
				}
				$upload_result = $model->validateUploadedFile($v, $options['types'] ?? []);
				if (!$upload_result['success']) {
					$result['error'][] = $upload_result['error'];
					return $result;
				}
			}
			$result['success'] = true;
			$result['data'] = $value;
			return $result;
		}
		// single file upload
		$upload_result = $model->validateUploadedFile($value, $options['types'] ?? []);
		if (!$upload_result['success']) {
			$result['error'][] = $upload_result['error'];
		} else {
			if (in_array('images', $options['types']) && !empty($options['image_size'])) {
				$temp = explode('x', $options['image_size']);
				$size = getimagesize($value['tmp_name']);
				if ($size[0] != $temp[0] || $size[1] != $temp[1]) {
					$result['error'][] = 'Invalid image size!';
					return $result;
				}
			}
			$result['success'] = true;
			$result['data'] = $value;
		}
		return $result;
	}
}