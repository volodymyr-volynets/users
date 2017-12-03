<?php

namespace Numbers\Users\Documents\Drivers\LocalFolder;
class Base implements \Numbers\Users\Documents\Base\Interface2\Base {

	/**
	 * Upload
	 *
	 * @param array $options
	 * @return array
	 */
	public function upload(array $options) : array {
		$result = [
			'success' => false,
			'error' => []
		];
		return $result;
	}

	/**
	 * Download
	 *
	 * @param array $options
	 * @return mixed
	 */
	public function download(array $options) {
		
	}
}